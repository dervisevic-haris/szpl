<?php 
include('helpers/userHelper.php');

class AdminController extends BaseController {

	public function showUsers()
	{
		$users=User::all();
		return View::make('ShowUsersView')->with(array('name'=>BaseController::getUserRole(Auth::user()->id).' '.Auth::user()->username,
			'users'=>$users));
	}
	public function deleteUser()
	{
		$uid=$_POST['param1'];
		$user=User::find($uid);
		$user->delete();

		$obj = new stdClass;
		$obj->redirectUrl ="/project/szpl/public/home/users";

		return json_encode($obj);
	}
	public function updateUser()
	{

		$uid=$_POST['uid'];
		$username=$_POST['username'];
		$email =$_POST['email'];
		$address = $_POST['address'];
		
		$userrole=BaseController::getUserRoleId($_POST['userrole']);


		$obj = new stdClass;
		$obj->message="uspijesno modifikacija";

		$obj->redirectUrl="/project/szpl/public/home/users";

		$user=User::find($uid);

		$user->username=$username;
		$user->email=$email;
		$user->adress=$address;
		$user->user_group_id=$userrole;
		if(!$_POST['password']=="")
		{
			$password = $_POST['password'];
			$user->password=Hash::make($_POST['password']);
		}	
		$user->active=1;
		$user->created_at=date("Y-m-d H:i:s"); 
		$user->updated_at=date("Y-m-d H:i:s");

		$user->save();

		return json_encode($obj);
	}
	public function usergroups(){
		$usergrup=userGroup::all();
		return View::make('ShowUserGroupView')->with(array('name'=>BaseController::getUserRole(Auth::user()->id).' '.Auth::user()->username,
			'usergroup'=>$usergrup));
	}
	public function updateUserGroup(){
		$obj = new stdClass;
		$obj->message="uspijesno modifikacija";
		$obj->redirectUrl="/project/szpl/public/home/usergroups";
		
		$id= $_POST['uid'];
		$naziv = $_POST['name'];
		$userGroup = userGroup::find($id);


		return json_encode($obj);

	}


}
?>