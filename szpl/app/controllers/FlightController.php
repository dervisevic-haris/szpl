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
		$obj->message = "Uspijesno ste unijeli let";
		$obj->url = "/project/szpl/public/home/flights/create";
		return json_encode($obj);
	}
	public function getFlightReservation(){
		$id=Auth::user()->id;
		$u=User::find($id)->userGroup()->first()->naziv;
		return View::make('FlightReservationView')->with('name',$u.' '.Auth::user()->username);
	}
	public function searchFlights(){
		$id=Auth::user()->id;
		$u=User::find($id)->userGroup()->first()->naziv;


		$sviLetovi = Flight::orWhere(function($query)
            {
                $query->where('departure_date','<=',$_POST['dateDeparture'])
                      ->where('departure','=',$_POST['inputFrom'])
                      ->where('arrival','=',$_POST['inputTo']);
                    
            })->paginate(10);
		
		return View::make('ShowFlightsReservationView')->with(array('name'=>$u.' '.Auth::user()->username,'letovi'=>$sviLetovi));
	}
	public function getFlight(){
		$izabraniLet = Flight::find($_POST['id']);
		return $izabraniLet->toJson();
	}

	public function postReservationFlight(){
		$rezervacijaLeta = new FlightReservation();
		$rezervacijaLeta->flight_id=$_POST['flightId'];
		$rezervacijaLeta->user_id=Auth::user()->id;
		$rezervacijaLeta->valid=1;
		$rezervacijaLeta->save();
		return json_encode((true));
	}
}