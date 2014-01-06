@extends('layout.UserOrGuestLayout')

@section('links')
 <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<script src="/project/szpl/public/jquery-timepicker-master/jquery.timepicker.js"></script>
<script src="/project/szpl/public/bootstrap-datetime/js/bootstrap-datetimepicker.min.js"></script>
<link href="/project/szpl/public/bootstrap-datetime/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
  <link href="/project/szpl/public/jquery-timepicker-master/jquery.timepicker.css" rel="stylesheet" media="screen">
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<style type="text/css">
.Buttons{
	position: absolute;
	right:20px;
}
</style>
<script type="text/javascript"> 
$(document).ready(function() { 


	$("#Change").on("click", function(e){
      e.preventDefault();
      var id= $.trim($('input[name=radioBtn]:checked').attr('value'));
       $('#myModal').modal('show');
     
    });

  $("#DropReservation").on("click", function(e){
      e.preventDefault();

      var id= $.trim($('input[name=radioBtn]:checked').attr('value'));
      $.ajax({
        url: '/project/szpl/public/home/flightreservation/drop',
        type: 'POST',
        dataType: 'json',
        data: {param1: id},
      })
      .done(function() {
        alert('Izabrana rezervacija izbrisana!');
        window.location ="/project/szpl/public/home/flightreservation/payment";
        console.log("success");
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
      
     
    });

    $("#SaveChange").on("click", function(e){
      e.preventDefault();
      var fid= $.trim($('input[name=radioBtn]:checked').attr('value'));

       $.ajax({
         url: '/project/szpl/public/home/flightreservation/id',
         type: 'POST',
         dataType: 'json',
         data: {id: fid},
       })
       .done(function() {
         console.log("success");
         alert('Izabrana rezervacija uspiješno potvrđena!');
          $('input[name=radioBtn]:checked').checked=false;    
          window.location ="/project/szpl/public/home/flightreservation/payment";
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
@endsection

@section('mainContent')

	<table id="my-table-sorter" class="table table-striped"> 
  <thead> 
    <tr> 
      <th>Izabrani</th>
      <th>Naziv leta</th>
      <th>Datum polaska</th> 
      <th>Vrijeme polaska</th> 
      <th>Avion sa kojim se putuje</th> 
      <th>Status</th> 
    </tr> 
  </thead> 
  <tbody> 
     <?php 
    foreach ($rezervacije as $u)
    {
    ?>
    <tr> 
      <?php if ($u->valid==0) {?>
      <td value='<?php echo $u->id  ?>' ><input type="radio" id="radioBtn" name="radioBtn" class="radio" value='<?php echo $u->id  ?>'></input></td>
      <?php } else { ?>
      <td></td>
      <?php } ?>
      <td>{{$u->Flight()->first()->name}}</td> 
      <td>{{$u->Flight()->first()->departure_date}}</td>
      <td>{{$u->Flight()->first()->departure_time}}</td>  
      <td>{{$u->Flight()->first()->Airplane()->first()->name}}</td> 
      <td><?php if($u->valid==1){ echo "Rezervacija potvrđena"; }else echo "Rezervacija niije potvrđena";?>    </td> 
    </tr> 
    <?php }?>
  </tbody> 
</table>
<div class="Buttons">
  <input type="button" id="Change" class="btn" name="Change" value="Potvrdi rezervaciju"></input>
  <input type="button" id="DropReservation" class="btn" name="Change" value="Otkaži rezervaciju"></input>
</div>

<div id="myModal" class="modal hide fade">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Rezervacija za let</h3>
  </div>
  <div class="modal-body">
    <input type="hidden" name="hidden" id="hidden"></input>
    <div class="control-group">
      <label class="control-label" for="inputEmail">Unesite broj kreditne kartice:</label>
    <div class="controls">
      <input type="text" id="inputDeparture" placeholder="broj kartice" >
    </div>
     </div>
  <div class="modal-footer">
    <a href="" class="btn" data-dismiss="modal">Close</a>
    <a href="" id="SaveChange" class="btn btn-primary">Potvrdi rezervaciju</a>
  </div>
@endsection