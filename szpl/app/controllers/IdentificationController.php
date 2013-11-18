<?php

class IdentificationController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function login()
	{
		$obj = new stdClass;
		$obj->success = false;
		$obj->message = "Pogresni pristupni podaci";
		$obj->redirectUrl ="/project/szpl/public/user";

		if (isset($_SESSION['loggedIn'])) {
				if($_SESSION["loggedIn"] == true){
					$obj->success = true;
				}
		}

		$user = user::where('email','=',$_POST['name'])->first();
		$sifra=$user['password'];

		if(Hash::check($_POST['password'],$sifra)){
			$obj->success = true;
		$_SESSION["loggedIn"] = true;
		}

		return json_encode($obj);

		
	}

	public function user() {
	return View::make('user')->with('name','hare');
	}



}