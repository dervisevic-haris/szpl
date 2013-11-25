<?php 
include('helpers/userHelper.php');

class AdminController extends BaseController {

	public function showUsers()
	{
		$users=User::all();
		return View::make('ShowUsersView')->with(array('name'=>BaseController::getUserRole(Auth::user()->id).' '.Auth::user()->username,
			'users'=>$users));
	}
}
?>