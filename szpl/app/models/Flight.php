<?php 

class Flight extends Eloquent {
	protected $table = 'flight';

	public function FlightReservation(){
		return $this->hasMany('FlightReservation');
	}

} 

?>