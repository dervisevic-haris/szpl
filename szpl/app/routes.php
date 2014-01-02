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



Route::controller('home/users', 'AdminController');

//Post delete ruta //pozvana iz ShowUsersViea putem ajaxa
//Route::post('home/users/delete',array('uses'=>'AdminController@deleteUser'));
//Route::post('home/users/update',array('uses'=>'AdminController@updateUser'));
//Route::get('home/users',array('uses'=>'AdminController@showUsers'))->before('auth');

//get userGroups
//Route::get('home/usergroups',array('uses'=>'AdminController@usergroups'))->before('auth');

//post update ruta // pozvana iz ShowUserGroupsViewa putem ajaxa
Route::post('home/usergroups/update',array('uses'=>'AdminController@updateUserGroup'));

Route::get('home/airplanes',array('uses'=>'CompanyController@airplanes'))->before('auth');

Route::get('home/flights',array('uses'=>'CompanyController@flights'))->before('auth');

Route::get('home/flights/create',array('uses'=>'CompanyController@getCreateFlight'))->before('auth');

Route::get('home/airplanes/create',array('uses'=>'CompanyController@getCreateAirplane'))->before('auth');

Route::get('home/airplanes/delete',array('uses'=>'CompanyController@getDeleteAirplane'))->before('auth');

Route::get('home/airplanes/update',array('uses'=>'CompanyController@getUpdateAirplane'))->before('auth');

//Rutira ajax post zahtjev sa CompanyView-a Nakon sto je korisnik unio sve podatke o kompaniji za koju radi
Route::post('home/company/update',array('uses'=>'CompanyController@update'));

Route::get('home/company/read',array('uses'=>'CompanyController@getCompanys'));


Route::post('/home/airplanes/create',array('uses'=>'AirplaneController@createAirplane'));

Route::post('/home/flights/create',array('uses'=>'FlightController@createFlight'));

Route::get('home/flightreservation',array('uses'=>'FlightController@getFlightReservation'));

Route::post('/home/flightreservation/search',array('uses'=>'FlightController@searchFlights'));

Route::get('/guest',function(){

	return View::make('UserOrGuestView');
});

