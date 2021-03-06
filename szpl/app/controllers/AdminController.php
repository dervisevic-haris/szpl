<?php 

class AdminController extends BaseController {


	//Filteri za AdminControler,tj filteri za home/users rute
	 public function __construct()
    {
    	$this->beforeFilter('auth');
    	//Svim rutama /home/users/... moze pristupati samo admin tako da je potrebno onemoguciti kako guesta tako i logovanog koristnika koji nije adminisitrator
        $this->beforeFilter('admin');
    }
    //Metoda koja ce se izvrsiti kada bude upucen GET http zahtjev na rutu /home/users/showusers
	public function getShowusers()
	{
		$users=User::paginate(10);
		return View::make('ShowUsersView')->with(array('name'=>BaseController::getUserRole(Auth::user()->id).' '.Auth::user()->username,
			'users'=>$users));
	}
	//... Post zahtjev na rutu /home/users/delete
	public function postDelete()
	{
		//Putem ajaxa se kupi User ID korisnika kojeg treba brisati,pronadje se dati korisnik i brise
		$uid=$_POST['uid'];
		$user=User::find($uid);
		$user->delete();
		//Vracanje dummy class objekta sa 1 atributom URLom na koji treba vrsiti redirect
		$obj = new stdClass;
		$obj->redirectUrl ="/project/szpl/public/home/users/showusers";

		return json_encode($obj);
	}
	//... /home/users/delete
	public function postUpdate()
	{
		//Parametri poslani putem Ajaxa sa ShowUsersView-a 
		$uid=$_POST['uid'];
		$username=$_POST['username'];
		$email =$_POST['email'];
		$address = $_POST['address'];
		//Parametar koji ce biti !="" ukoliko je neko unio novo ime Kompanije za koju predstavnik aviokompanije treba da radi
		$company=$_POST['company'];
		//Parametar koji ce biti !="" ukoliko je korisnik izabrao vec neku postojecu kompaniju i dodjelio korisnika njoj
		$chosedCompany = $_POST['chosedCompany'];
		//Parametar koji ce sadrzavati ID kompanije koju je korisnik izabrao iz liste vec postojecih kompanija
		
		if(isset($_POST['cid']))
		$companyId=$_POST['cid'];

		$userrole=BaseController::getUserRoleId($_POST['userrole']);

		//Ukoliko je taj parametar razlicit od praznog stringa kreiraj novu Companiju unesi samo "ime" kompanije i upisi u bazu
		//Ostale informacije o kompaniji ce popuniti po prvom Login-u predstavnik te kompanije
		if($company!="")
		{
			$k= new Company;
			$k->name=$company;
			$k->created_at=date("Y-m-d H:i:s"); 
			$k->updated_at=date("Y-m-d H:i:s");
			$k->save();
		}
		

		//Dummy class objekat koji cemo vratiti kao json,u sebi sadrzi da parametre poruke(da li je uspijesno modifikacija) i url na koji se vrsi redirect
		$obj = new stdClass;
		$obj->message="Uspiješna modifikacija";
		$obj->redirectUrl="/project/szpl/public/home/users/showusers";


		$user=User::find($uid);

		$user->username=$username;
		$user->email=$email;
		$user->adress=$address;
		$user->user_group_id=$userrole;
		//Ukoliko je proslijedjen novi passsword upisi ga u bazu u protivnom ne diraj nista(ostavi u bazi onaj koji je vec tu)
		if(!$_POST['password']=="")
		{
			$password = $_POST['password'];
			$user->password=Hash::make($_POST['password']);
		}	
		//Nepotreban active atribut
		$user->active=1;
		//Created_at i Updated_at moraju sve Tabele nase baze imati!!!
		$user->created_at=date("Y-m-d H:i:s"); 
		$user->updated_at=date("Y-m-d H:i:s");
		if($company!="")
		$user->Company_id=$k->id;

		if(isset($companyId) && $companyId!="")
		$user->Company_id=intval(Company::find($companyId)->id);


		$user->save();

		return json_encode($obj);
	}
	public function getUsergroups(){
		//Iz baze pokupive sve usergrupe i posalji ih na View ShowUserGroupView koji ce ih prikazat
		$usergrup=userGroup::all();
		return View::make('ShowUserGroupView')->with(array('name'=>BaseController::getUserRole(Auth::user()->id).' '.Auth::user()->username,
			'usergroup'=>$usergrup));
	}
	public function updateUserGroup(){

		$obj = new stdClass;
		$obj->message="Uspiješna modifikacija";
		$obj->redirectUrl="/project/szpl/public/home/users/usergroups";
		
		$id= $_POST['uid'];
		$naziv = $_POST['name'];
		$userGroup = userGroup::find($id);


		return json_encode($obj);

	}


}
?>