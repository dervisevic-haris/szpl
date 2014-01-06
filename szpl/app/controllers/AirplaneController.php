<?php
include('helpers/userHelper.php');
class AirplaneController extends BaseController {

	public function createAirplane(){
		$avion = new Airplane();
		$avion->name = $_POST['NazivAviona'];
		$avion->company_id = $_POST['idKompanije'];
		$avion->economy_class = $_POST['EkonomskaKlasa'];
		$avion->business_class = $_POST['BiznisKlasa'];
		$avion->first_class=$_POST['PrvaKlasa'];
		$avion->created_at = date("Y-m-d H:i:s"); 
		$avion->updated_at=date("Y-m-d H:i:s");
		$avion->save();

		$obj = new stdClass;
		$obj->message = "Uspiješno Ste unijeli avion";
		$obj->url = "/project/szpl/public/home/airplanes/create";
		return json_encode($obj);
	}
}