<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
       Schema::create('Users',function($table){
         $table->increments('id');
         $table->string('username',255)->nullable();
         $table->string('password',255);
         $table->string('email',255)->nullable();
         $table->integer('role')->default(2);
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
	Schema::dropIfExists('Users');	//
	}

}
