<?php 
include('helpers/userHelper.php');

class CompanyController extends BaseController {

		public function airplanes()
		{
			$u=userGroup::find(2)->User()->first();
			$id=Auth::user()->id; //Uzimamo id trenutno logovanog korisnika
			$u=user::find($id)->userGroup()->first()->naziv;
			return View::make('AirplaneView')->with('name',$u.' '.Auth::user()->username);
		}

		public function flights()
		{
			$u=userGroup::find(2)->User()->first();
			$id=Auth::user()->id; //Uzimamo id trenutno logovanog korisnika
			$u=user::find($id)->userGroup()->first()->naziv;
			return View::make('FlightView')->with('name',$u.' '.Auth::user()->username);
		}
		public function getCreateAirplane()
		{
			$u=userGroup::find(2)->User()->first();
			$id=Auth::user()->id; //Uzimamo id trenutno logovanog korisnika
			$u=user::find($id)->userGroup()->first()->naziv;
			return View::make('CreateAirplaneView')->with('name',$u.' '.Auth::user()->username);
		}
		public function getDeleteAirplane()
		{
			$u=userGroup::find(2)->User()->first();
			$id=Auth::user()->id; //Uzimamo id trenutno logovanog korisnika
			$u=user::find($id)->userGroup()->first()->naziv;
			return View::make('DeleteAirplaneView')->with('name',$u.' '.Auth::user()->username);
		}
		public function getUpdateAirplane()
		{
			$u=userGroup::find(2)->User()->first();
			$id=Auth::user()->id; //Uzimamo id trenutno logovanog korisnika
			$u=user::find($id)->userGroup()->first()->naziv;
			return View::make('UpdateAirplaneView')->with('name',$u.' '.Auth::user()->username);
		}
		public function getCreateFlight()
		{
			$u=userGroup::find(2)->User()->first();
			$id=Auth::user()->id; //Uzimamo id trenutno logovanog korisnika
			$u=user::find($id)->userGroup()->first()->naziv;
			return View::make('CreateFlightView')->with('name',$u.' '.Auth::user()->username);
		}


}
?>