<?php 

class user extends Eloquent {
			 protected $table = 'users';

	 public function userGroup() {
	 	
		return $this->belongsTo('userGroup');
	}

}
?>