<?php
include('helpers/userHelper.php');
class FlightController extends BaseController {

	public function createFlight(){

		$let = new Flight();
		
		$let->name = $_POST['NazivLeta'];
		$let->departure = $_POST['MjestoPolaska'];
		$let->arrival = $_POST['MjestoDolaska'];
		$let->departure_date = $_POST['DatumPolaska'];
		$let->departure_time=$_POST['VrijemePolaska'];
		$let->created_at = date("Y-m-d H:i:s"); 
		$let->updated_at=date("Y-m-d H:i:s");
		$let->arrival_date = $_POST['DatumDolaska'];
		$let->arrival_time=$_POST['VrijemeDolaska'];
		$let->one_way_ticket_price = $_POST['CijenaJednosmjerneKarte'];
		$let->return_ticket_price = $_POST['CijenaPovratneKarte'];
		$let->airplane_id= $_POST['IzabraniAvion'];
		$let->save();
		
		

		$obj = new stdClass;
		$obj->message = "Uspiješno Ste unijeli let";
		return json_encode($obj);
	}
	public function getFlightReservation(){
		if(Auth::check())
		{
		$id=Auth::user()->id;
		$u=User::find($id)->userGroup()->first()->naziv;
		$u.=" ".Auth::user()->username;
		}
		else 
			$u="guest";

		return View::make('FlightReservationView')->with('name',$u.' ');
	}
	public function searchFlights(){
		if(Auth::check())
		{
		$id=Auth::user()->id;
		$u=User::find($id)->userGroup()->first()->naziv;
		$u.=" ".Auth::user()->username;
	    }
		else 
			$u="guest";



		$sviLetovi = Flight::orWhere(function($query)
            {
                $query->where('departure_date','<=',$_POST['dateDeparture'])
                      ->where('departure','=',$_POST['inputFrom'])
                      ->where('arrival','=',$_POST['inputTo']);
                    
            })->paginate(10);
		
		return View::make('ShowFlightsReservationView')->with(array('name'=>$u,'letovi'=>$sviLetovi));
	}

	public function getFlight(){
		if(isset($_POST['id'])){
		$izabraniLet = Flight::find($_POST['id']);
		return $izabraniLet->toJson();
	}
	}

	public function payment(){

		if(!Auth::check())
  			return Redirect::to('/registration');

		if(Auth::check())
		{
		$id=Auth::user()->id;
		$u=User::find($id)->userGroup()->first()->naziv;
		$u.=" ".Auth::user()->username;
		$guest=false;
	    }
		else 
		{$u="guest";
	
		}
			
		if(Auth::check())
		$rezervacije = FlightReservation::where('user_id','=',Auth::user()->id)->get();
		else 
			$rezervacije="";
				
		return View::make('FlightReservationValideteView')->with(array('name'=>$u,'rezervacije'=>$rezervacije));
		
	}

	public function postReservationFlight(){
		$rezervacijaLeta = new FlightReservation();
		$rezervacijaLeta->flight_id=$_POST['flightId'];
		$rezervacijaLeta->user_id=Auth::user()->id;
		$rezervacijaLeta->valid=0;
		$rezervacijaLeta->save();
		return json_encode((true));
	}
	public function validateFlight(){

		$ValidirajRezervaciju = FlightReservation::find($_POST['id']);
		$ValidirajRezervaciju->valid=1;
		$ValidirajRezervaciju->save();
		return json_encode(true);

	}
	public function dropFlightReservation(){
		if(isset($_POST['param1']))
		{
			$Rezervacija = FlightReservation::find($_POST['param1']);
			$Rezervacija->delete();
			return json_encode(true);
		}
	}
}