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
            <h2 class="text-left login-title">Brisanje aviona</h2>
            <div class="account-wall" id="ControlGroup">
            	<form class="form-horizontal" id="creatingAirplanes" method="POST" action="">
            		<div class="modal-body">
            			<div class="control-group">
            				<label class="control-label">Avion:</label>
            				<div class="controls">
            					<select class="selectpicker" name="avion"></select>
            				</div><br>
                            <div id="buttons">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <button class="btn btn-lg btn-primary" type="submit" id="createAirplaneButton">Potvrdi</button>
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