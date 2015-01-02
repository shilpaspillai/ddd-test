<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImageIntoUsers extends Migration {

	
	public function up()
	{
	   Schema::table('users',function($table){
                $table->string('profile_picture')->nullable();
            });
	}


	public function down()
	{
	     Schema::table('users',function($table){
             $table->dropColumn('profile_picture');
            });
	}


}
