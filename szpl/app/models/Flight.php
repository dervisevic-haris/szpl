<?php 

class Flight extends Eloquent {
	protected $table = 'flight';

	public function FlightReservation(){
		return $this->hasMany('FlightReservation');
	}
	 public function Airplane() {
	 	
		return $this->belongsTo('Airplane','airplane_id');
	}

} 

?>