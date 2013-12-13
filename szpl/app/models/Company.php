<?php 

class Company extends Eloquent {
	protected $table = 'company';

	public function User(){
		return $this->hasMany('User');
	}

} 

?>