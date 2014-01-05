<?php 

class Airplane extends Eloquent {
	protected $table = 'airplane';

	public function Flight(){
		return $this->hasMany('Flight');
	}

} 

?>