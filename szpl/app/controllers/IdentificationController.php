<?php
include('helpers/userHelper.php');
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
		return View::make('LoginView');
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

		if($u == "Administrator")
			return View::make('user')->with('name',$u.' '.Auth::user()->username);
		else if($u == "Aviokompanija")
			return View::make('CompanyView')->with('name',$u.' '.Auth::user()->username);
		else 
			return View::make('user')->with('name',$u.' '.Auth::user()->username);

	}
	//Log out akcija
	public function logout()
	{
		    Auth::logout();
		    return Redirect::to('/');
	}

	public function getregister () {
			return View::make('registration');
	}

	public function register () {
		$user= new User;
		$username=$_POST['username'];
		$password=$_POST['password'];
		$retypePassword=$_POST['passwordRetyped'];
		$email=$_POST['email'];

		if($password!=$retypePassword)
			return View::make('registration')->with('error','Unijeli ste razlicite sifre');
		
		$email=User::where('email','=',$_POST['email'])->count();
		if($email!=0)
			return View::make('registration')->with('error','Email postoji u bazi');

		$username=User::where('username','=',$_POST['username'])->count();
		if($username!=0)
			return View::make('registration')->with('error','Username postoji u bazi');

		$user->username=$_POST['username'];
		//Moramo napraivi hes od unesene sifre
		$user->password=Hash::make($_POST['password']);

		$user->email=$_POST['email'];

		$user->adress=$_POST['address'];
		//date format jedini razumljiv za Sql db
		$user->created_at=date("Y-m-d H:i:s"); 
		$user->updated_at=date("Y-m-d H:i:s");  
		//userRole klasu koristimo iz public foldera kao enumeraciju da ne pisemo 1,2,3 rucno.
		$user->user_group_id= userRole::Korisnik;
		//spasit u bazu kreirani model user

		//Dodati u try catch poslije
		$user->save();

		return View::make('registration')->with('success',true);



	}


}