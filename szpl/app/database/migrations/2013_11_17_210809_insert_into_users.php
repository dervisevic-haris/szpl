<?php

use Illuminate\Database\Migrations\Migration;

class InsertIntoUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$password = Hash::make('secret');
		DB::table('users')->insert(
    array('username' => 'hary', 
    	'password' => $password ,
    	'email'=>'90dervisevic.haris@gmail.com',    	
    	'adress'=>'Bosanskih Gazija 27',
    	'role'=>null,'active'=>1,
    	'created_at'=>'2013-11-24 15:30:12',
    	'updated_at'=>'2013-11-24 15:30:12'));
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