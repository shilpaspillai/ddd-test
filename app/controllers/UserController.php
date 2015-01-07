<?php

use app\lib\Services\Notification as Notification;
use app\lib\Services\ApplicationServices\UserService as UserService;
use app\lib\Exceptions as UserExceptions;

class UserController extends BaseController {

    protected $user_service = '';
    protected $notificationService = '';

    public function __construct(Notification $notificationService, UserService $user_service) {

        $this->user_service = $user_service;
        $this->notificationService = $notificationService;
    }

    public function show_login_page() {
        return View::make('login');
    }

    public function display_user_list() {
        $search_key = Input::get('searchterm')? : '';
        $user_data = $this->user_service->list_users_by_user_service($search_key, Input::get('page') ? Input::get('page') : 1);
        if ($user_data) {
            return View::make('admin.list', $user_data);
        } else {
            return View::make('admin.list')->message('NO data found');
        }
    }

    public function edit_user_data($id) {
        $uid = $id;
        $result = $this->user_service->get_user_detail_by_id($uid);
        if ($result) {
            return View::make('admin.edit')->with('data', $result);
        }
    }

    public function update_user_data($id) {
        $uid = $id;
        $config = array(
            'firstname' => Input::get('first_name'),
            'surname' => Input::get('sur_name'),
            'email' => Input::get('email'),
            'current_id' => $uid
        );

        if (Input::get('first_name') == NULL || Input::get('sur_name') == NULL || Input::get('email') == NULL || $uid == NULL) {
            return Redirect::Route('edit_user_list')->with('message', 'enter all fields..')->withInput();
        }

        try {
            $user_data = $this->user_service->update_user_detail($config);
            if ($user_data) {
                $response['status'] = $this->notificationService->throwSuccess(300, "User Data Updated Successfully");
                return Redirect::Route('list_all_users')->with('message', 'User Detail updated successfully');
            }
        } catch (UserExceptions\UserNameExistingException $ex) {
            $this->notificationService->throwError(1007);
        }
    }

    public function delete_user_data($id) {
        $config = array('current_id' => $id);
        $user_result = $this->user_service->delete_user_by_id($config);

        if ($user_result) {
            return Redirect::Route('list_all_users')->with('message', 'User deleted successfully');
        } else { {
                return Redirect::Route('list_all_users')->with('message', 'Failed');
            }
        }
    }

    public function process_login_page() {
        $config = array(
            'email' => Input::get('email'),
            'password' => Input::get('password'),
        );
        $user_data = $this->user_service->process_login($config);

        if ($user_data) {
            return $user_data->role == ROLE_ADMIN ? Redirect::Route('show_admin_profile') : Redirect::Route('userdashboard');
        } else {
            return Redirect::Route('login')->with('message', 'Incorrect Email or Password')->withInput();
        }
    }

    public function display_admin_profile() {
         $uid = Session::get('id');
        $pro_pic_data= $this->user_service->display_profile_picture($uid);
        return View::make('admin.admin_dashboard')->with('data',$pro_pic_data);;
    }

    public function display_user_profile() {
        $uid = Session::get('id');
        $search_result = $this->user_service->check_already_signin($uid);

        if ($search_result) {
            $data = array('status' => true);
        } else {
            $data = array('status' => false);
        }
        $pro_pic_data= $this->user_service->display_profile_picture($uid);
        return View::make('user.profile')->with('user_data', $data)->with('data',$pro_pic_data);
    }

    public function process_signin() {
        $uid = Session::get('id');
        $date = $this->user_service->process_signin($uid);
        $result = date('Y-m-d H:i:s', $date);
        if ($result) {
            return $result;
        }
        return FALSE;
    }

    public function process_signout() {
        $uid = Session::get('id');
        $date = $this->user_service->process_signout($uid);
        $result = date('Y-m-d H:i:s', $date);
        if ($result) {
            return $result;
        }
        return FALSE;
    }

    public function logout() {
        Session::flush();
        return View::make('login');
    }

    public function display_registration_page() {
        return View::make('admin.user_registeration');
    }

    public function process_user_registration() {
        $config = array(
            'firstname' => Input::get('first_name'),
            'surname' => Input::get('sur_name'),
            'email' => Input::get('email'),
            'password' => Input::get('usrpassword'),
            'password_reset_token' => substr(md5(rand(9,9999)),0,8).'-'.substr(md5(rand(9,9999)),3,4).'-'.substr(md5(rand(9,9999)),6,4),
            'role' => 2
        );

        if (Input::get('first_name') == NULL || Input::get('sur_name') == NULL || Input::get('email') == NULL || Input::get('usrpassword') == NULL) {
            return Redirect::Route('user_registration')->with('message', 'enter all fields..')->withInput();
        }
        try {
            $user_data = $this->user_service->process_regiser_user($config);
            if ($user_data) {

                $response['status'] = $this->notificationService->throwSuccess(200, "User registered Successfully");
                return Redirect::route('user_registration')->with('message', 'Registration Successful');
            }
        } catch (UserExceptions\UsernameNotValidException $ex) {
            $this->notificationService->throwError(1005);
        } catch (UserExceptions\UserEntityNotValidException $ex) {
            $this->notificationService->throwError(1004);
        } catch (UserExceptions\UserAlreadyExistingException $ex) {
            $this->notificationService->throwError(1007);
        } catch (UserExceptions\SurNameNotValidException $ex) {
            $this->notificationService->throwError(1006);
        } catch (UserExceptions\PasswordNotValidException $ex) {
            $this->notificationService->throwError(1002);
        } catch (UserExceptions\PasswordEntityNotValidException $ex) {
            $this->notificationService->throwError(1003);
        } catch (UserExceptions\EmailNotValidException $ex) {
            $this->notificationService->throwError(1000);
        } catch (UserExceptions\CredentialNotValidException $ex) {
            $this->notificationService->throwError(1008);
        }
    }

    public function is_email_exist() {
        if (isset($_GET['cemail'])) {
            $input_email = $_GET['cemail'];
            $result = $this->user_service->is_email_exist_by_user_service($input_email);
            if ($result)
                return "Email already exist";
            else {
                return "valid";
            }
        }
    }

    public function search_by_name() {
        $input_name = Input::get('first_name');
        $result = $this->user_service->search_by_user_service($input_name);
        return View::make('admin.search_result_list')->with('user_name', $result);
    }

    public function generate_user_report($id) {
        $uid = $id;
        $data = $this->user_service->generate_user_report($id);
        $result = $this->user_service->get_user_detail_by_id($uid);
        return View::make('admin.generate_user_report')->with('user_data', $data)->with('user_detail', $result);
    }
    public function set_profile_picture()
    {
            $uid = Session::get('id');
             $role = Session::get('role');
            $mimetype=Input::file('image')->getClientMimeType();
            $type=explode("/",$mimetype);
            if($type[0] == 'image')
            {
            $filename=date('dmYHis').Input::file('image')->getClientOriginalName();
            $path=Input::file('image')->move(ROOT_PATH.'/assets/upload/',$filename);
            $result=$this->user_service->set_profile_picture($filename,$uid);
            
                 if($role != 1)
                 {
                     if($result){ return self::display_user_profile();}
                     else{return Redirect::route('userdashboard')->with('message','profile picture upload failed');}
                 }
                 else 
                 {
                    if($result){ return self::display_admin_profile();}  
                    else {return Redirect::route('show_admin_profile')->with('message','profile picture upload failed');}
                 }
            }
            else
            {
            if($role != 1)
              {return Redirect::route('userdashboard')->with('message','use image file only');}
            else{return Redirect::route('show_admin_profile')->with('message','use image file only');}
              }
    }

    public function delete_profile_picture($id)
    {
        $uid = $id;
        $result = $this->user_service->delete_profile_picture($uid); 
        $role = Session::get('role');
        if($role != 1)
            {if($result)
                {
                { return self::display_user_profile();}
                }
            else{
                return Redirect::route('userdashboard')->with('message','delete operation  failed');
                }
            }
        else{
               if($result)
                {
                {return self::display_admin_profile();}
                }
                else
                 {return Redirect::route('show_admin_profile')->with('message','delete operation  failed');
                 }
            }
    }
    public function show_forget_password_page()
    {
        return View::make('forget_password');
    }
     public function check_email_exist_by_forget_password()
     {
        if($_GET['cemail'])
        {
            $email =$_GET['cemail'];
            $result=$this->user_service->check_email_exist_by_forget_password($email);
            ob_clean();
                if($result)
                {$result_set=array('status'=>true,'message' => 'email is valid','password_reset_link' => "<a href=\"".URL::to('forget_password/reset/'.$result->password_reset_token)."\"> <h4>click here to reset password</h4></a>");
                die(json_encode($result_set));}
                else
                {$result_set=array('status'=>false,'message' => 'email is Invalid');
                die(json_encode($result_set));}
        }
        else 
        {return Redirect::Route('login')->with('message', 'process failed. contact Admin');}
    }
    
    public function reset_forget_password_section($password_reset_token)
    {
      $result = $this->user_service->is_valid_token($password_reset_token);
      if($result)
      {$token = $password_reset_token;
      return View::make('password_reset')->with('token',$token);}
      else{return Redirect::route('login')->with('message','unknown error contact admin');}
    }
    
    public function process_password_reset()
    {
    $password = Input::get('usrpassword'); 
    $reset_token = Input::get('token');
   $result = $this->user_service->is_valid_token($reset_token);
    if($result)
    {
      $hash_password =  $this->user_service->get_hashed_password($password);
     
     $result_set = $this->user_service->process_password_reset_section($hash_password->password,$reset_token);}
     if($result_set)
     {
        return Redirect::route('login')->with('message','password updated successfully! try with new credential'); 
     }
    else{
      return Redirect::route('login')->with('message','unknown error contact admin');  
     }
    }
}


?>

