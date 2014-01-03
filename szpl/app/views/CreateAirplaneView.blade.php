disextends('layout.AirplaneLayout')
@section('someScript')
<script type="text/javascript">
$( document ).ready(function() {
        $("#createAirplaneButton").on("click", function(e){
            e.preventDefault();

            var nazivAviona = $("#inputName").val();
            var registracijaAviona = $("#inputRegistration").val();
            var ekonomskaKlasa = $("#inputEconomyClassSeats").val();
            var biznisKlasa = $("#inputBusinessClassSeats").val();
            var prvaKlasa= $("#inputFirstClassSeats").val();
            var id=$('#hidden').val();

         $.ajax({
                url: '/project/szpl/public/home/airplanes/create',
                type: 'POST',
                dataType: 'json',
                data: {
                  NazivAviona: nazivAviona,
                  RegistracijaAviona:registracijaAviona,
                  EkonomskaKlasa:ekonomskaKlasa,
                  BiznisKlasa:biznisKlasa,
                  PrvaKlasa:prvaKlasa,
                  idKompanije:id
                },
              })
              .done(function(data) {
                alert(data.message);
              })
              .fail(function() {
                console.log("error");
              })
              .always(function() {
                console.log("complete");
              });
          });
    });
</script>

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
            <h2 class="text-left login-title">Kreiranje aviona</h2>
            <div class="account-wall" id="ControlGroup">
            	<form class="form-horizontal" id="creatingAirplanes">
            		<div class="modal-body">
            			<div class="control-group">
                             <label class="control-label">Naziv:</label>
                               <div class="controls"><input type="text" id="inputName" name="name" >
                            </div><br>
            				<label class="control-label" for="inputName">Aviokompanija:</label>
            				<div class="controls">
                                 <input type="hidden" name="hidden" id="hidden" value=<?php echo Auth::user()->Company()->first()->id ?> ></input>
            					<input type="text" id="inputName" name="name" value=<?php echo Auth::user()->Company()->first()->name?> placeholder="uraa" disabled >
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
                            <div id="buttons">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <button class="btn btn-lg btn-primary" type="button" id="createAirplaneButton">Kreiraj</button>
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