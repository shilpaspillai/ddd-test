<?php

namespace app\lib\Domain\RepositoryInterface\User;

interface RepositoryInterface {

    public static function process_login_credentials($user_email, $user_password);

    public static function is_email_exist_by_user_repo($input_email);

    public static function create($user_entity);

    public static function is_existing_username($username);

    public static function get_all_users($search_key,$page = 1);

    public static function get_user_detail_by_repo($uid);

    public static function find_user_detail($current_id);

    public static function save($user_entity);

    public static function find_by_id($uid);

    public static function delete_user($config);

    public static function find_by_pub_id($config);
    
    public static function process_signin($uid);
    
    public static function  process_signout($uid);
    
    public static function check_already_signin($uid);
    
    public static function generate_user_report($id);
    
    public static function set_profile_picture($filename,$uid);
    
    public static function display_profile_picture($uid);
    
    public static function delete_profile_picture($uid);
    
    public static function check_email_exist_by_forget_password($email);
    
    public static function is_valid_token($password_reset_token);
    
    public static function  process_password_reset_section($password,$reset_token);
}
?>

