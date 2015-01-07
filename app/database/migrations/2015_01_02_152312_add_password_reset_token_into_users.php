<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPasswordResetTokenIntoUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
        public function up()
	{
	   Schema::table('users',function($table){
                $table->string('password_reset_token')->nullable();
            });
	}


	public function down()
	{
	     Schema::table('users',function($table){
             $table->dropColumn('password_reset_token');
            });
	}

}
