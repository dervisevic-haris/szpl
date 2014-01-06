@extends('layout.FlightLayout')
@section('links')
 <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<script src="/project/szpl/public/jquery-timepicker-master/jquery.timepicker.js"></script>
<script src="/project/szpl/public/bootstrap-datetime/js/bootstrap-datetimepicker.min.js"></script>
<link href="/project/szpl/public/bootstrap-datetime/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
  <link href="/project/szpl/public/jquery-timepicker-master/jquery.timepicker.css" rel="stylesheet" media="screen">
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
@endsection
@section('someScript')
<script type="text/javascript">
  $( document ).ready(function() {
   
 $(function() {
    $('#datetimepicker1').datetimepicker({
      pickTime: false
    });
  });
 $(function() {
    $('#datetimepicker2').datetimepicker({
      pickDate: false
    });
  });
 $(function() {
    $('#datetimepicker4').datetimepicker({
      pickDate: false
    });
  });
 $(function() {
    $('#datetimepicker3').datetimepicker({
      pickTime: false
    });
  });
 $("#createFlight").on("click", function(e){
    e.preventDefault();
    var nazivLeta= $('#inputName').val();
    var idKompanije = $('#hidden').val();
    var Polaziste = $('#inputFrom').val();
    var Odrediste = $('#inputTo').val();
    var datumPolaska = $('#datepicker').val();
    var vrijemePolaska = $('#timepicker').val();
    var datumDolaska = $('#datepicker1').val();
    var vrijemeDolaska = $('#timepicker1').val();
    var izabraniAvion = $('#Airplanes').find(":selected").val();
    var cijenaJednosmjerneKarte = $('#Cijena').val();
    var cijenaPovratneKarte = $('#CijenaObaSmjera').val();
    
    
    $.ajax({
                url: '/project/szpl/public/home/flights/create',
                type: 'POST',
                dataType: 'json',
                data: {
                NazivLeta:nazivLeta,
                IdKompanije:idKompanije,
                MjestoPolaska:Polaziste,
                MjestoDolaska:Odrediste,
                DatumPolaska:datumPolaska,
                VrijemePolaska:vrijemePolaska,
                DatumDolaska:datumDolaska,
                VrijemeDolaska:vrijemeDolaska,
                IzabraniAvion:izabraniAvion,
                CijenaJednosmjerneKarte:cijenaJednosmjerneKarte,
                CijenaPovratneKarte:cijenaPovratneKarte
                },
              })
              .done(function(data) {
                alert(data.message);
              })
              .fail(function(data) {
                console.log("error");


              })
              .always(function() {
                console.log("complete");
              });

     
          });

  });
</script>

<style type="text/css">
.Container1{
    position: absolute;
    left:33%;  
}
</style>
@endsection
@section('mainContent')
<div class="Container1">
     <h2 class="text-left login-title">Unos leta</h2>
        <form class="form-horizontal" id="creatingAirplanes">
                        <div class="control-group">
                             <label class="control-label">Naziv leta:</label>
                               <div class="controls"><input type="text" id="inputName" name="name" >
                            </div><br>
                            <label class="control-label" for="inputName">Cijena karte (I smjer):</label>
                            <div class="controls">
                                <input type="text" id="Cijena" name="name" placeholder="cijena" >
                            </div><br>
                            <label class="control-label" for="inputName">Cijena karte (II smjera):</label>
                            <div class="controls">
                                <input type="text" id="CijenaObaSmjera" name="name" placeholder="cijena" >
                            </div><br>
                            <label class="control-label" for="inputFrom">Polazižte:</label>
                            <div class="controls">
                                <input type="text" id="inputFrom" name="inputFrom">
                            </div><br>
                            <label class="control-label" for="inputTo">Odredište:</label>
                            <div class="controls">
                                <input type="text" id="inputTo" name="inputTo">
                            </div><br>
                            <label class="control-label" for="DepartureDate">Unesite datum polaska:</label>
                            <div class="controls">
                                     <div id="datetimepicker1" class="input-append date">
                                          <input  data-format="yyyy/MM/dd" type="text" id="datepicker"></input>
                                              <span class="add-on">
                                                 <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                                              </span>
                                     </div>  
                            </div><br>
                             <label class="control-label" for="inputDepartureTime">Vrijeme polaska:</label>
                                <div class="controls">
                                   <div id="datetimepicker2" class="input-append date">
                                     <input data-format="hh:mm:ss" type="text" id="timepicker"></input>
                                          <span class="add-on">
                                             <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                                          </span>
                                     </div>
                                 </div><br>
                            <label class="control-label" for="inputDepartureTime">Unesite datum dolaska:</label>
                            <div class="controls">
                                     <div id="datetimepicker3" class="input-append date">
                                          <input data-format="yyyy/MM/dd" type="text" id="datepicker1"></input>
                                              <span class="add-on">
                                                 <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                                              </span>
                                     </div>
                            </div><br>
                            <label class="control-label" for="inputArrivalTime">Vrijeme dolaska:</label>
                               <div class="controls">
                                      <div id="datetimepicker4" class="input-append date">
                                          <input data-format="hh:mm:ss" type="text" id="timepicker1"></input>
                                                 <span class="add-on">
                                                   <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                                                 </span>
                                       </div>
                              </div><br>
                        
                            <label class="control-label" for="inputUsername">Avion:</label>
                            <div class="controls">
                                <select id="Airplanes">
                                    <?php foreach($avioni as $a)
                                        {
                                    ?>
                                    <option value='<?php echo $a->id  ?>'>{{ $a->name}} </option>
                                    <?php }?>
                                </select>
                            </div><br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <button class="btn btn-lg btn-primary" type="button" id="createFlight">Kreiraj</button>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <button class="btn btn-danger" type="button" id="cancelButton" action="/">Odustani</button> 
            </form>
            </div>
        </div>
@endsection