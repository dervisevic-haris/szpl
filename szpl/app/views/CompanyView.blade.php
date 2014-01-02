@extends('layout.CompanyLayout')
@section('someScript')
<style type="text/css">
#alert {
	position: absolute;
	left:25%;
}
</style>
<script type="text/javascript">
$(document).ready(function() { 
	$('#InfoPanel').hide();
	 $("#InputData").on("click", function(e){
	 	 e.preventDefault();
	 	   $('#myModal').modal('show');
	 });

	 $("#SaveChange").on('click', function(event) {
   		 event.preventDefault();
        var companyName = $('#inputName').val();
        var address=  $('#inputAddress').val();
        var email= $('#inputEmail').val();
        var city=$('#inputCity').val();
        var country= $('#inputCountry').val();
        var id=$('#hidden').val();
        var telefon = $ ('#inputTelephone').val();
        
        
        $.ajax({
        url: '/project/szpl/public/home/company/update',
        type: 'POST',
        dataType: 'json',
        data: {
          cid: id,
          CompanyName: companyName,
          email: email,
          city: city,
          country:country,
          address:address,
          Telephone:telefon
        },
      })
      .done(function(data) {
         alert(data.message);
          $('#myModal').modal('hide');
          $('#alert').hide();
          $('#InfoPanel').show();



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
@if($prviput==1)
<div class="alert alert-info" id="alert"><h2>Podaci o kompaniji nisu uneseni</h2>
	<p>Molimo vas da unesete osnovne informacije o kompaniji,kako bi bili u stanju nastaviti koristi nasu aplikaciju</p>
	 <button class="btn btn-primary" id="InputData" type="button">Unesite Podatke</button>
</div>
@endif
<div class="alert alert-info .alert-dismis" id="InfoPanel">Uspijesno ste popunili informacije o kompaniji
<button type="button" class="close" data-dismiss="alert">&times;</button>
</div>
<div id="myModal" class="modal hide fade">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Informacije o kompaniji</h3>
  </div>
  <div class="modal-body">
    <input type="hidden" name="hidden" id="hidden" value='<?php 
    if(isset($CompanyId))
      echo $CompanyId ?>'></input>
    <div class="control-group">
      <label class="control-label" for="inputName">Naziv Kompanije</label>
    <div class="controls">
      <input type="text" id="inputName" placeholder="Name">
    </div>
     </div>
    <div class="control-group">
      <label class="control-label" for="inputEmail">Email</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Email">
    </div>
     </div>
      <div class="control-group">
      <label class="control-label" for="inputAddress">Address</label>
    <div class="controls">
      <input type="text" id="inputAddress" placeholder="Address">
    </div>
     </div>
  <div class="control-group">
    <label class="control-label" for="inputCity">City</label>
    <div class="controls">
      <input type="text" id="inputCity" placeholder="City">
    </div>
  </div>
    <div class="control-group">
    <label class="control-label" for="inputCountry">Country</label>
    <div class="controls">
      <input type="text" id="inputCountry" placeholder="Country">
    </div>
  </div>
   <div class="control-group">
    <label class="control-label" for="inputTelephone">Kontakt Telefon:</label>
    <div class="controls">
      <input type="text" id="inputTelephone" placeholder="Tel">
    </div>
  </div>
  </div>
  <div class="modal-footer">
    <a href="" class="btn">Close</a>
    <a href="" id="SaveChange" class="btn btn-primary">Save changes</a>
  </div>




@endsection