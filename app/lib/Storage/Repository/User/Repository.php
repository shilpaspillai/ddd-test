<?php

namespace app\lib\Storage\Repository\User;

use app\lib\Exceptions\UserAlreadyExistingException as UserAlreadyExistingException;
use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Support\Facades\DB as DB;

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use app\lib\Domain\RepositoryInterface\User\RepositoryInterface as UserRepositoryInterface;

class Repository implements UserRepositoryInterface {

    public static function process_login_credentials($user_email, $user_password) {
        if (Auth::attempt(array('email' => $user_email, 'password' => $user_password))) {
            $result = \User::where('email', '=', $user_email)->firstOrFail();
            \Session::put('email', $user_email);
            \Session::put('id', $result->id);
            \Session::put('role', $result->role);
            \Session::put('firstname', $result->username);
            return(($result) ? $result : FALSE);
        }
    }

    public static function is_email_exist_by_user_repo($input_email) {
        $result = \User::where('email', '=', $input_email)->firstOrFail();
        return(($result) ? TRUE : FALSE);
    }

    public static function create($user_entity) {
        if (self::is_existing_username($user_entity->email->get_email())) {
            throw new UserAlreadyExistingException("User Email Already Exists");
        } else {
            $user = \User::create(array(
                        'username' => $user_entity->firstname->get_firstname(),
                        'password' => $user_entity->password->get_password(),
                        'email' => $user_entity->email->get_email(),
                        'surname' => $user_entity->surname->get_surname(),
                         'password_reset_token' => $user_entity->password_reset_token->get_password_reset_token(),
                         'role' => $user_entity->role->get_role()
            ));
            return $user;
        }
    }

    public static function is_existing_username($username) {
        $user = \User::where('email', '=', $username)->first();
        return (!$user) ? FALSE : TRUE;
    }

    public static function get_all_users($search_key, $page = 1) {
        $query = \User::where('role', '!=', 1);
        if (($search_key != ''))
            $query->where('username', 'LIKE', $search_key . '%');
        $return['count'] = $query->count();
        $query->offset(($page - 1) * 5)->limit(5);
        $return['users'] = $query->get();
        return (!$return['users']) ? FALSE : $return;
    }

    public static function get_user_detail_by_repo($uid) {
        $search_result = \User::where('id', '=', $uid)->first();
        return(!$search_result) ? FALSE : $search_result;
    }

    public static function find_user_detail($current_id) {
        $search_result = \User::where('id', '=', $current_id)->first();
        return(!$search_result) ? FALSE : $search_result;
    }

    public static function save($user_entity) {
        $user = self::find_by_id($user_entity->id->get_id());
        if ($user->username != $user_entity->firstname->get_firstname()) {
            $existing_user = \User::where('username', '=', $user_entity->firstname->get_firstname())->first();
            if ($existing_user)
                throw new UserAlreadyExistingException("Username is already taken.");
        }
        $user->username = $user_entity->firstname->get_firstname();
        $user->email = $user_entity->email->get_email();
        $user->surname = $user_entity->surname->get_surname();
        $user->save();
    }

    public static function delete_user($config) {
        $user = self::find_by_pub_id($config);
        if ($user) {
            $user->delete();
            return true;
        }
    }

    public static function find_by_pub_id($config) {
        $user = \User::where('id', '=', $config['current_id'])->first();
        return(($user->role) == 1) ? FALSE : $user;
    }

    public static function find_by_id($uid) {
        $user = \User::where('id', '=', $uid)->first();
        return $user;
    }

    public static function get_name_by_repo($input_name) {
        $name = \User::where('username', 'LIKE', $input_name . '%')->get();
        if ($name) {
            $result = array('status' => true, 'data' => $name);
            return(($result));
        } else {
            $result = array('status' => false, 'data' => 'no data found');
            return $result;
        }
    }

    public static function process_signin($uid) {
        $time = time();
        $date = date('Y-m-d H:i:s', $time);
        \Signup_detail::create(array(
            'signin' => $date, 'user_id' => $uid
        ));
        $result = strtotime($date);
        return($result) ? $result : FALSE;
    }

    public static function check_already_signin($uid) {
        $date = date('Y-m-d');
        $result = \Signup_detail::where('user_id', '=', $uid)->where('signout', '=', NULL)->where('signin', 'LIKE', $date . '%')->first();
        {
          return($result) ? TRUE : FALSE;
        }
    }

    public static function process_signout($uid) {
        $time = time();
        $date = date('Y-m-d H:i:s', $time);
        $user = \Signup_detail::where('user_id', '=', $uid)->where('signout', '=', NULL)->first();
        $user->signout = $date;
        $user->save();
        $result = strtotime($date);
        return($result) ? $result : FALSE;
    }

    public static function generate_user_report($id) {
      
          $user= \DB::table('signup_details')
                     ->select(\DB::raw("DATE(signin) as dw,IF(signout = NULL,0,SUM(TIMEDIFF(signout,signin))) as timewrked"))
                     ->where('user_id', '=', $id)
                     ->groupBy('dw')
                    ->get();
        return($user) ? $user : FALSE; 
    }
    public static function set_profile_picture($filename,$uid)
    {
        $user = \User::where('id', '=', $uid)->update(array('profile_picture' => $filename));
        return($user) ? $user : FALSE;
    }
    
    public static function display_profile_picture($uid)
    {
         $user = \User::where('id', '=', $uid)->pluck('profile_picture');
         return($user) ? $user : FALSE;
    }
    
    public static function delete_profile_picture($uid)
    {
         $user = \User::where('id', '=', $uid)->update(array('profile_picture' => NULL));
         return($user) ? $user : FALSE;  
    }
    
    public static function check_email_exist_by_forget_password($email)
    {
      $user = \User::where('email', '=', $email)->first(); 
      return($user) ? $user : FALSE; 
    }
    
    public static function is_valid_token($password_reset_token)
    {
         $result = \User::where('password_reset_token', '=', $password_reset_token)->firstOrFail();
        return(($result) ? TRUE : FALSE);
        
    }
    
    public static function process_password_reset_section($hash_password,$reset_token)
    {
        $user = \User::where('password_reset_token', '=', $reset_token)->update(array('password' =>$hash_password));
    
         return($user) ? $user : FALSE;  
    }

}

?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             