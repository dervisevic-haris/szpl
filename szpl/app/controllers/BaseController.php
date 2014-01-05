<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}
	public static function getUserRole($id){
		$u=user::find($id)->userGroup()->first()->naziv;
		return $u;
	}

	public static function Atentifikacija(){
		if(Auth::check())
			return Auth::user()->username;
		else 
			return "Guest";
	}

	public static function getUserRoleId($userRoleString)
	{
		if($userRoleString=="Administrator")
			return 1;
		else if ($userRoleString=="Korisnik")
			return 2;
		else if($userRoleString=="Aviokompanija")
			return 3;
		else
			return 0;
	}
}