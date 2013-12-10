<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('homepage');
})->before('guest');

Route::post('login', array('uses'=>'IdentificationController@login'));
Route::get('home',array('as'=>'home','uses'=>'IdentificationController@home'))->before('auth');

//Logout ruta
Route::get('logout',array('as'=>'logout','uses'=>'IdentificationController@logout'));


//Get-login
Route::get('login',array('as'=>'login','uses'=>'IdentificationController@getlogin'))->before('guest');

//Get Registration form
Route::get('registration',array('uses'=>'IdentificationController@getregister'));


//Post registration ruta
Route::post('registration',array('uses'=>'IdentificationController@register'));

Route::get('home/users',array('uses'=>'AdminController@showUsers'))->before('auth');

//Post delete ruta //pozvana iz ShowUsersViea putem ajaxa
Route::post('home/users/delete',array('uses'=>'AdminController@deleteUser'));

Route::post('home/users/update',array('uses'=>'AdminController@updateUser'));

//get userGroups
Route::get('home/usergroups',array('uses'=>'AdminController@usergroups'))->before('auth');

//post update ruta // pozvana iz ShowUserGroupsViewa putem ajaxa
Route::post('home/usergroups/update',array('uses'=>'AdminController@updateUserGroup'));