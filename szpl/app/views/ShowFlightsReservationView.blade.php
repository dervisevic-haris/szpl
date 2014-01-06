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

      $.ajax({
        url: '/project/szpl/public/home/flights/id',
        type: 'POST',
        dataType: 'json',
        data: {id:  id},
      })
      .done(function(letovi) {
        console.log("success");
      
        $('#inputDeparture').attr("value",letovi.departure);
        $('#arrival').val(letovi.arrival);

       $('#myModal').modal('show');
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
       var id= $.trim($('input[name=radioBtn]:checked').attr('value'));
        $.ajax({
          url: '/project/szpl/public/home/flightreservation',
          type: 'POST',
          dataType: 'json',
          data: {
            flightId: id
            },
        })
        .success(function(data){
           alert('Uspiješno ste rezervisali let');
        })
        .done(function(data) {
          console.log("success");
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
      <th>Polazište</th> 
      <th>Odredište</th> 
      <th>Datum polaska</th> 
      <th>Vrijeme polaska</th> 
      <th>Datum dolaska</th> 
      <th>Vrijeme dolaska</th>
      <th>Karta u I smijeru</th> 
      <th>Povratna karta</th>
    </tr> 
  </thead> 
  <tbody> 
     <?php 
    foreach ($letovi as $u)
    {
    ?>
    <tr> 
      <td value='<?php echo $u->id  ?>' ><input type="radio" id="radioBtn" name="radioBtn" class="radio" value='<?php echo $u->id  ?>'></input></td>
      <td >{{$u->name}}</td> 
      <td>{{$u->departure}}</td> 
      <td>{{$u->arrival}}</td> 
      <td>{{$u->departure_date}}</td> 
      <td>{{$u->departure_time}}</td> 
      <td>{{$u->arrival_date}}</td> 
      <td>{{$u->arrival_time}}</td> 
      <td>{{$u->one_way_ticket_price}}</td> 
      <td>{{$u->return_ticket_price}}</td> 
    </tr> 
    <?php }?>
  </tbody> 
</table>
<?php echo $letovi->links(); ?>
<div class="Buttons">
  <input type="button" id="Change" class="btn" name="Change" value="Rezerviši let"></input>
</div>

<div id="myModal" class="modal hide fade">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Rezervacija za let</h3>
  </div>
  <div class="modal-body">
    <input type="hidden" name="hidden" id="hidden"></input>
    <div class="control-group">
      <label class="control-label" for="inputEmail">Polazište:</label>
    <div class="controls">
      <input type="text" id="inputDeparture" placeholder="" disabled>
    </div>
     </div>
     <div class="control-group">
      <label class="control-label" for="arrival">Odredište:</label>
    <div class="controls">
      <input type="text" id="arrival" placeholder="" disabled>
    </div>
     </div>
 <label class="control-label" for="inputEmail">Rezervacija za:</label>
  <select id="Class">
  <option >Ekonomska Klasa</option>
  <option >Biznis Klasa</option>
  <option >Prva Klasa</option>
</select>
  <div class="modal-footer">
    <a href="" class="btn" data-dismiss="modal">Close</a>
    <a href="" id="SaveChange" class="btn btn-primary">Rezerviši</a>
  </div>
@endsection