@extends('layout.AirplaneLayout')
@section('someScript')
<style type="text/css">
.Container {
position: absolute;
left:33%;

}
</style>
@endsection
@section('mainContent')
<table id="my-table-sorter" class="table table-striped"> 
  <thead> 
    <tr> 
      <th>Change</th>
      <th>Id</th>
      <th>Username</th> 
      <th>Address</th> 
      <th>Email</th> 
      <th>Role</th> 
    </tr> 
  </thead> 
  <tbody> 
     <?php 
    foreach ($users as $u)
    {
    ?>
    <tr> 
      <td><input type="radio" id="radioBtn" name="radioBtn" class="radio" value='<?php echo $u->id  ?>'></input></td>
      <td id="id">{{$u->id}}</td>
      <td id="username">{{$u->username}}</td> 
      <td>{{$u->adress}}</td> 
      <td>{{$u->email}}</td> 
      <td>{{BaseController::getUserRole($u->id)}}</td> 
    </tr> 
    <?php }?>
  </tbody> 
</table>

                            <div id="buttons">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <button class="btn btn-lg btn-primary" type="submit" id="createAirplaneButton">Kreiraj</button>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <button class="btn btn-danger" type="button" id="cancelButton" action="/">Odustani</button> 
                            </div>
            
    
@endsection