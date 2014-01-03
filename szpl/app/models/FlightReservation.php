<?php 

class FlightReservation extends Eloquent {
	
	protected $table = 'flight_reservation';

	 public function Flight() {
	 	
		return $this->belongsTo('flight','flight_id');
	}
	 public function User() {
	 	
		return $this->belongsTo('users','user_id');
	}

} 

?>