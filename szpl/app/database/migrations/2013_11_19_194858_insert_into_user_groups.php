<?php

use Illuminate\Database\Migrations\Migration;

class InsertIntoUserGroups extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('user_groups')->insert(array(
			'naziv'=>'Administrator'
			));
		DB::table('user_groups')->insert(array(
			'naziv'=>'Korisnik'
			));
		DB::table('user_groups')->insert(array(
			'naziv'=>'Aviokompanija'
			));
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