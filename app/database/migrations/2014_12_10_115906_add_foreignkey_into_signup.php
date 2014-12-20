<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignkeyIntoSignup extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('Signup_details',function($table){
	$table->integer('user_id')->unsigned();
        $table->foreign('user_id')->references('id')->on('users');
         });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('Signup_details',function($table){
	$table->dropForeign('signup_details_user_id_foreign');
         }); 
	}

}
