<?php 

class userGroup extends Eloquent {
	protected $table = 'user_groups';

	public function User(){
		return $this->hasMany('User');
	}

} 


?>