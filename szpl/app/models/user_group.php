<?php 


class user_group extends Eloquent {
	
public  function users() {
		return $this->hasMany('user');
	}
}



?>