<?php
namespace app\lib\Services\ApplicationServices;
use app\lib\Exceptions as Exceptions;
 
use app\lib\Domain\ValueObjects\User as UserValueObjects;
use app\lib\Storage\Repository\User\Repository as UserRepository;
use app\lib\Domain\Factory\User\Factory as  Userfactory;
error_reporting(E_ALL);
ini_set('display_errors', 1);
class UserService{
    protected $user_repo = '';
    function __construct(UserRepository $user_repo) {
        $this->user_repo = $user_repo;
    }
    public function process_login($config)
    {
    $result = $this->user_repo->process_login_credentials($config['email'],$config['password']);
    if($result)
    { 
    return(($result) ? $result : FALSE);
    }else    
    throw new Exceptions\CredentialNotValidException();
    }
    public function is_email_exist_by_user_service($input_email)
    {
    $result=$this->user_repo->is_email_exist_by_user_repo($input_email);
    return(($result) ? TRUE :FALSE);
    }
    public function process_regiser_user($config)
    {
     $user_config['password'] =  new UserValueObjects\Password(UserValueObjects\Password::encrypt($config['password']));  
     $user_config['email'] = new UserValueObjects\email($config['email']);
     $user_config['firstname'] = new UserValueObjects\firstname($config['firstname']);
     $user_config['surname'] = new UserValueObjects\surname($config['surname']);
     $user_config['role'] =new UserValueObjects\role($config['role']);
     $user_entity = Userfactory::create($user_config);
     $response=$this->user_repo->create($user_entity);
     return(($response)?TRUE:FALSE);
    }
    
    public function update_user_detail($config)
    {
    $user_entity = $this->user_repo->find_user_detail($config['current_id']);
    $user_entity->email = new UserValueObjects\email($config['email']);
    $user_entity->firstname  = new UserValueObjects\firstname($config['firstname']);
    $user_entity->surname = new UserValueObjects\surname($config['surname']); 
    $user_entity->id = new UserValueObjects\id($config['current_id']);
    $this->user_repo->save($user_entity);
    return true;
    }
    public function delete_user_by_id($config)
    {
      $result = $this->user_repo->delete_user($config);
      return(($result)?TRUE:FALSE);
    }
    public function check_already_signin($uid)
    {
      $result =$this->user_repo->check_already_signin($uid);
      return($result)?$result:FALSE;
    }
    
    public function process_signin($uid)
    {
        $result = $this->user_repo->process_signin($uid);
        return($result)?$result:FALSE;
    }
    public function process_signout($uid)
    {
      $result = $this->user_repo->process_signout($uid);
      return($result)?$result:FALSE;
    }

    public function list_users_by_user_service($search_key,$page = 1)
    {
      $result = $this->user_repo->get_all_users($search_key,$page);
      return(($result)? $result : FALSE);
    }
 
    public function get_user_detail_by_id($uid)
    {
        $result = $this->user_repo->get_user_detail_by_repo($uid);
        return(($result) ? $result :FALSE);
    }
    public function search_by_user_service($input_name)
    {
      $result = $this->user_repo->get_name_by_repo($input_name);
      return $result;
    }
    
    public function generate_user_report($id)
    {
      $result =  $this->user_repo->generate_user_report($id);
       return(($result) ? $result :FALSE);
    }
    public function set_profile_picture($filename,$uid)
    {
        $result = $this->user_repo->set_profile_picture($filename,$uid);
           return(($result) ? $result :FALSE);
    }
    public function display_profile_picture($uid)
    {
        $result =$this->user_repo->display_profile_picture($uid);
        return(($result) ? $result :FALSE);
    }
    
    }

?>
