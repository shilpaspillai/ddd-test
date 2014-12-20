<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSignupIntoUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
        public function up()
	{
         Schema::create('Signup_details',function($table){
         $table->increments('id');
         $table->dateTime('signin')->nullable();
         $table->dateTime('signout')->nullable();
         $table->timestamps();
        }
        );		
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
        public function down()
	{
	Schema::dropIfExists('Signup_details');	//
	}
}
