<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

//common routes for admin and user
Route::match(array('get','post'),'/',array('as'=>'login','uses'=>'userController@show_login_page'));
Route::match(array('get','post'),'/login',array('as'=>'login','uses'=>'userController@show_login_page'));
Route::match(array('get','post'),'/process_login',array('as'=>'login_processLogin','uses'=>'userController@process_login_page'));
Route::match(array('get','post'),'/logout',array('as'=>'signout','uses'=>'userController@logout'));


//admin routes
Route::match(array('get','post'),'/admin/profile',array('before'=>'auth|admin_role','as'=>'show_admin_profile','uses'=>'userController@display_admin_profile'));
Route::match(array('get','post'),'/admin/user_registration',array('before'=>'auth|admin_role','as'=>'user_registration','uses'=>'userController@display_registration_page'));
Route::match(array('get','post'),'/admin/process_user_registration',array('before'=>'auth|admin_role','as'=>'process_user_registration','uses'=>'userController@process_user_registration'));
Route::match(array('get','post'),'/admin/check_email_exist',array('before'=>'auth|admin_role','as'=>'check_email_exist','uses'=>'userController@is_email_exist'));
Route::match(array('get','post'),'/admin/user/list',array('before'=>'auth|admin_role','as'=>'list_all_users','uses'=>'userController@display_user_list'));
Route::match(array('get','post'),'admin/user/edit/{id}',array('before'=>'auth|admin_role','as'=>'edit_user_list','uses'=>'userController@edit_user_data'));
Route::match(array('get','post'),'admin/user/delete/{id}',array('before'=>'auth|admin_role','as'=>'delete_user_data','uses'=>'userController@delete_user_data'));
Route::match(array('get','post'),'admin/user/report/{id}',array('before'=>'auth|admin_role','as'=>'generate_user_report','uses'=>'userController@generate_user_report'));
Route::match(array('get','post'),'/admin/list/users',array('before'=>'auth|admin_role','as'=>'list_all_users','uses'=>'userController@display_user_list'));
Route::match(array('get','post'),'admin/user/update/{id}',array('before'=>'auth|admin_role','as'=>'update_user_data','uses'=>'userController@update_user_data'));
Route::match(array('get','post'),'admin/user/search',array('as'=>'search_by_name','uses'=>'userController@search_by_name'));

//user routes
Route::match(array('get','post'),'/user/signin',array('as'=>'get_signin_time','uses'=>'userController@process_signin'));
Route::match(array('get','post'),'/user/signout',array('as'=>'get_signout_time','uses'=>'userController@process_signout'));
Route::get('/user/dashboard',array('before'=>'auth|user_role','as'=>'userdashboard','uses'=>'userController@display_user_profile'));


//authentication through admin role
Route::filter('admin_role', function()
{
          $role = Session::get('role');
          if($role!=ROLE_ADMIN)
           return Redirect::Route('login');
          
});
//authentication through user role
Route::filter('user_role',function()
{
    $role = Session::get('role');
    if($role != ROLE_NORMAL_USER)
    return Redirect::Route('login');
});
?>
