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
	//Akcija getLogin 

	public function getlogin(){
		return View::make('login');
	}

	//Akcija Login za provjeru podataka poslanih ajaxom

	public function login()
	{
		$obj = new stdClass;
		$obj->success = false;
		$obj->message = "Pogresni pristupni podaci";
		$obj->redirectUrl ="/project/szpl/public/home";

		$user = array ('username'=>$_POST['name'],'password'=>$_POST['password']); // Kreiramo niz sa podacima poslatih sa forme i spasvamo u varijablu user koju proslijedjujemo Auth klasi i njenoj metodi Attempt da provjeri da li postoji takav user u bazi i ukoliko postoji da u sessiju doda njegov ID!

        if (Auth::attempt($user)) {
           	$obj->success=true;
           	$obj->message="Uspijesno logiranje";
        }
		return json_encode($obj);	
	}

	// Akcija prikazivanje home stranice za logovanog korisinka

	public function home() 
	{
	//	
	
	//	$u=userGroup::find(2)->User()->first();
		$id=Auth::user()->id; //Uzimamo id trenutno logovanog korisnika
		$u=user::find($id)->userGroup()->first()->naziv;
		return View::make('user')->with('name',$u.' '.Auth::user()->username);
	}

	//Log out akcija

	public function logout()
	{
		    Auth::logout();
		    return Redirect::to('/');
	}


}