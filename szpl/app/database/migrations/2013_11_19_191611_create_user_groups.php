<?php

use Illuminate\Database\Migrations\Migration;

class CreateUserGroups extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			Schema::Create('user_groups',function($table){
			$table->increments('id');
			$table->string('naziv',32);
	
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_groups');
	}

}