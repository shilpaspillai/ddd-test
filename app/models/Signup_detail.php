<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Signup_detail extends Eloquent implements UserInterface, RemindableInterface {
   use UserTrait, RemindableTrait;	

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'Signup_details';
        protected $fillable=array('signin','signout','user_id','created_at','updated_at');
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

}
