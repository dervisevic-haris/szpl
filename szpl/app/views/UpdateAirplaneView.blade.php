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
<div class="container">
    <div class="row">
        <div class="Container">
            <h2 class="text-left login-title">Ažuriranje aviona</h2>
            <div class="account-wall" id="ControlGroup">
            	<form class="form-horizontal" id="creatingAirplanes" method="POST" action="">
            		<div class="modal-body">
            			<div class="control-group">
                            <label class="control-label">Avion:</label>
                            <div class="controls">
                                <select class="selectpicker" name="avion"></select>
                            </div><br>
            				<label class="control-label" for="inputName">Naziv:</label>
            				<div class="controls">
            					<input type="text" id="inputName" name="name">
            				</div><br>
            				<label class="control-label" for="inputRegistration">Registracija:</label>
            				<div class="controls">
            					<input type="text" id="inputRegistration" name="registration">
            				</div><br>
            				<label class="control-label" for="inputEconomyClassSeats">Ekonomska klasa:</label>
            				<div class="controls">
            					<input type="text" id="inputEconomyClassSeats" name="economyClassSeats">
            				</div><br>
            				<label class="control-label" for="inputBusinessClassSeats">Poslovna klasa:</label>
            				<div class="controls">
            					<input type="text" id="inputBusinessClassSeats" name="businessClassSeats">
            				</div><br>
            				<label class="control-label" for="inputFirstClassSeats">Prva klasa:</label>
            				<div class="controls">
            					<input type="text" id="inputFirstClassSeats" name="firstClassSeats">
            				</div><br>
            				<label class="control-label" for="inputInfo">Dodatne informacije:</label>
            				<div class="controls">
            					<input type="text" id="inputInfo" name="info">
            				</div><br>
                            <div id="buttons">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <button class="btn btn-lg btn-primary" type="submit" id="createAirplaneButton">Kreiraj</button>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <button class="btn btn-danger" type="button" id="cancelButton" action="/">Odustani</button> 
                            </div>
            			</div>
            		</div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection