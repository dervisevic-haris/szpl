<?php

use Illuminate\Database\Migrations\Migration;

class InsertIntoUserss extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	$password = Hash::make('437alpha');
		DB::table('users')->insert(
   			 array('username' => 'selma', 
    	'password' => $password ,
    	'email'=>'90dervisevic.mirza@gmail.com',    	
    	'adress'=>'Bosanskih Gazija 27',
    	'role'=>null,'active'=>1,
    	'created_at'=>'2013-11-24 15:30:12',
    	'updated_at'=>'2013-11-24 15:30:12',
    	'user_group_id'=>3));
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