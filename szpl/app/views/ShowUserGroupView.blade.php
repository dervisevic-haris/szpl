@extends('layout.defaultAdmin')



@section('links')

<script src="/project/szpl/public/tablesorter/jquery.tablesorter.min.js" type="text/javascript"></script> 

<link rel="stylesheet" href="/project/szpl/public/tablesorter/themes/blue/style.css"></link>
<style type="text/css">
.Buttons{
  position: absolute;
  right:20px;
}
</style>
<script type="text/javascript"> 
$(document).ready(function() { 
  $("#my-table-sorter").tablesorter(); 
$("#Change").on("click", function(e){
      e.preventDefault();
      var id= $.trim($('input[name=radioBtn]:checked').attr('value'));
      $('#my-table-sorter tr').each(function(){
        if($.trim(parseInt($(this).find('td').eq(1).text())) == id){
          //uzimamo sve vrijednosti polja iz reda gdje je Id== cekiranom ID-u
          var uid = $(this).find('td').eq(1).text();
          var naziv = $(this).find('td').eq(2).text();
            //proslijedjujemo pokupljene informacije iz tabele u modal za eventualne izmjene
          $('#inputName').attr('value',naziv);
          $('#myModal').modal('show');

        }
    });
    });

  $("#Delete").on('click', function(event) {
      var id= $.trim($('input[name=radioBtn]:checked').attr('value'));
      $.ajax({
        url: '/project/szpl/public/home/usergroups/delete',
        type: 'POST',
        dataType: 'json',
        data: {param1: id},
      })
      .done(function(data) {
         window.location = data.redirectUrl;
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
      


    });

  $("#SaveChange").on('click', function(event) {
    event.preventDefault();
       var id= $.trim($('input[name=radioBtn]:checked').attr('value'));
       var naziv= $('#inputName').val();    
       $.ajax({
        url: '/project/szpl/public/home/usergroups/update',
        type: 'POST',
        dataType: 'json',
        data: {
          uid: id,
          name: naziv
        },
      })
      .done(function(data) {
         window.location = data.redirectUrl;
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
      <th>Izmijeni</th>
      <th>Korisnička grupa</th>
    </tr> 
  </thead> 
  <tbody> 
     <?php 
    foreach ($usergroup as $u)
    {
    ?>
    <tr> 
      <td><input type="radio" id="radioBtn" name="radioBtn" class="radio" value='<?php echo $u->id  ?>'></input></td>
      <td id="id">{{$u->id}}</td>
      <td id="username">{{$u->naziv}}</td> 
    </tr> 
    <?php }?>
  </tbody> 
</table>
<div class="Buttons">
  <input type="button" id="Change" class="btn" name="Change" value="Izmijeni podatke"></input>
  <input type="button" id="Delete" class="btn" name="Change" value="Izbriši korisika"></input>
</div>

<div id="myModal" class="modal hide fade">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Izmijena korisnika</h3>
  </div>
  <div class="modal-body">
    <input type="hidden" name="hidden" id="hidden"></input>
    <div class="control-group">
      <label class="control-label" for="inputName">Naziv:</label>
    <div class="controls">
      <input type="text" id="inputName" placeholder="NewName">
    </div>
     </div>
  </div>
  <div class="modal-footer">
    <a href="" class="btn">Close</a>
    <a href="" id="SaveChange" class="btn btn-primary">Save changes</a>
  </div>
</div>


@endsection