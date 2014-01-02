@extends('layout.UserOrGuestLayout')

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
            <h2 class="text-left login-title">Rezervacija Leta</h2>
            <div class="account-wall" id="ControlGroup">
            	<form class="form-horizontal" id="FlightReservation" method="POST" action="/project/szpl/public/home/flightreservation/search">
            		<div class="modal-body">
            			<div class="control-group">
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
                                          <input  data-format="yyyy-MM-dd" type="text" id="datepicker" name = "dateDeparture"></input>
                                              <span class="add-on">
                                                 <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                                              </span>
                                     </div>  
                            </div><br>
                           
                        
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <button class="btn btn-lg btn-primary" type="submit" id="createFlight">Pretrazi Letove</button>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <button class="btn btn-danger" type="button" id="cancelButton" action="/">Odustani</button> 
                        
            			</div>
            		</div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection