<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnSurname extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
		 
	public function up()
	{
	   Schema::table('users',function($table){
                $table->string('surname')->nullable();
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	     Schema::table('users',function($table){
             $table->dropColumn('surname');
            });
	}

}
