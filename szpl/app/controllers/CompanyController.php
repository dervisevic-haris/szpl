<?php 
include('helpers/userHelper.php');

class CompanyController extends BaseController {

		public function airplanes()
		{
			$ImeKompanije = Auth::user()->Company()->first()->name;
			$id=Auth::user()->id; //Uzimamo id trenutno logovanog korisnika
			$u=user::find($id)->userGroup()->first()->naziv;
			return View::make('AirplaneView')->with('name',$u.' '.$ImeKompanije);
		}

		public function flights()
		{
			$ImeKompanije = Auth::user()->Company()->first()->name;
			$id=Auth::user()->id; //Uzimamo id trenutno logovanog korisnika
			$u=user::find($id)->userGroup()->first()->naziv;
			return View::make('FlightView')->with('name',$u.' '.$ImeKompanije);
		}
		public function getCreateAirplane()
		{
			$ImeKompanije = Auth::user()->Company()->first()->name;
			$id=Auth::user()->id; //Uzimamo id trenutno logovanog korisnika
			$u=user::find($id)->userGroup()->first()->naziv;
			return View::make('CreateAirplaneView')->with('name',$u.' '.$ImeKompanije);
		}
		public function getDeleteAirplane()
		{
			$ImeKompanije = Auth::user()->Company()->first()->name;
			$id=Auth::user()->id; //Uzimamo id trenutno logovanog korisnika
			$u=user::find($id)->userGroup()->first()->naziv;
			return View::make('DeleteAirplaneView')->with('name',$u.' '.$ImeKompanije);
		}
		public function getUpdateAirplane()
		{
			$ImeKompanije = Auth::user()->Company()->first()->name;
			$id=Auth::user()->id; //Uzimamo id trenutno logovanog korisnika
			$u=user::find($id)->userGroup()->first()->naziv;
			return View::make('UpdateAirplaneView')->with('name',$u.' '.$ImeKompanije);
		}
		public function getCreateFlight()
		{
			$ImeKompanije = Auth::user()->Company()->first()->name;
			$id=Auth::user()->id; //Uzimamo id trenutno logovanog korisnika
			$u=user::find($id)->userGroup()->first()->naziv;
			$avioni=Airplane::where('company_id','=',Auth::user()->Company_id)->get();
			return View::make('CreateFlightView')->with(array('name'=> $u.' '.$ImeKompanije,'avioni'=>$avioni));
		}

			public function update()
		{
			
			$obj = new stdClass;
			$obj->success = false;
			$obj->message = "Uspijesno ste azurirali informacije o kompaniji";

			$idKompanije = $_POST['cid'];
			//Iz baze pronalazimo kompaniju sa ovim id-om
			$kompanija = Company::find($_POST['cid']);
			//postavljamo atribute $komapnije na one poslane ajax post zahtjevom
			if(isset($_POST['email']) && !empty($_POST['email']))
			$kompanija->email =$_POST['email'];
			if(isset($_POST['address']) && !empty($_POST['address']))
			$kompanija->address =$_POST['address'];
			if(isset($_POST['city']) && !empty($_POST['city']))
			$kompanija->city = $_POST['city'];
			if(isset($_POST['country']) && !empty($_POST['country']))
			$kompanija->country=$_POST['country'];
			if(isset($_POST['CompanyName']) && !empty($_POST['CompanyName']))
			$kompanija->name = $_POST['CompanyName'];
			if(isset($_POST['Telephone']) && !empty($_POST['Telephone']))
			$kompanija->phone_number = $_POST['Telephone'];


			$kompanija->save();

			return json_encode($obj);

		}

		public function getCompanys(){
			 $kompanije = Company::all();
			 return $kompanije->toJson();

			
		}



}
?>