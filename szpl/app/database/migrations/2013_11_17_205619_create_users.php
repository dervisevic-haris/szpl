<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::Create('users',function($table){
			$table->increments('id');

			$table->string('username',32);
			$table->string('password',64);
			$table->string('email',32);
			$table->string('adress',32);
			
			$table->integer('role')->nullable();

			$table->boolean('active');

			$table->timestamps();

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}