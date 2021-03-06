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
          var username = $(this).find('td').eq(2).text();
          var email =$(this).find('td').eq(4).text();
          var address=  $(this).find('td').eq(3).text();
          var role=  $(this).find('td').eq(5).text();

            //proslijedjujemo pokupljene informacije iz tabele u modal za eventualne izmjene
          $('#inputUsername').attr('value',username);
          $('#inputEmail').attr('value',email);
          $('#inputAddress').attr('value',address);
          $('#inputPassword').attr('placeholder','input new password');
          $('#userRole').val($.trim(role));
          $('#hidden').val(uid);


          if($('#userRole').val()=="Aviokompanija")
           $('.Company').show();
               else
              $('.Company').hide();

          $('#ChosedCompany').hide();

          $('#myModal').modal('show');

        }
    });

    });

  $("#Delete").on('click', function(event) {
      var id= $.trim($('input[name=radioBtn]:checked').attr('value'));
      $.ajax({
        url: '/project/szpl/public/home/users/delete',
        type: 'POST',
        dataType: 'json',
        data: {uid: id},
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
  $("#ChoseCompany").on('click', function(event) {
    event.preventDefault();

    $.ajax({
        url: '/project/szpl/public/home/company/read',
        type: 'GET',
        dataType: 'json'
      })
      .done(function(data) {
           $('#ChosedCompany').append(new Option("",""));
          for(var i=0; i<data.length; i++)
              {
                $('#ChosedCompany').append(new Option(data[i].name,data[i].id));
              }
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });

    $('#ChoseCompany').hide();
    $('#ChosedCompany').show();


  });

  $("#SaveChange").on('click', function(event) {
    event.preventDefault();

        var id= $.trim($('input[name=radioBtn]:checked').attr('value'));
        var username= $('#inputUsername').val();
        var address=  $('#inputAddress').val();
        var email= $('#inputEmail').val();
        var password=$('#inputPassword').val();
        var userrole= $('#userRole').val();
        var CompanyName = $('#inputCompany').val();
        var ChosedCompany = $('#ChosedCompany').val();

        //Uzimamo ID kompanije koja je selektovana. 
        var CompanyId = $('#ChosedCompany').find(":selected").val();

        var isVisible = $('#ChosedCompany').is(':visible');
        if(isVisible==false)
            ChosedCompany="";

        

        if(CompanyName!="" && ChosedCompany!="")
          alert('Nova kompanija ili vec postojeća?');
        else
        {
       $.ajax({
        url: '/project/szpl/public/home/users/update',
        type: 'POST',
        dataType: 'json',
        data: {
          uid: id,
          username: username,
          email: email,
          password: password,
          userrole:userrole,
          address:address,
          company:CompanyName,
          chosedCompany:ChosedCompany,
          cid:CompanyId
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
    }
  });
    

  
  $( "#userRole" ).change(function() {
    if($('#userRole').val()=="Aviokompanija")
      $('.Company').show();
    else
      $('.Company').hide();


   
});

        
  });
</script>
@endsection

@section('mainContent')
	<table id="my-table-sorter" class="table table-striped"> 
  <thead> 
    <tr> 
      <th>Izmijeni</th>
      <th>ID</th>
      <th>Korisničko ime</th> 
      <th>Adresa</th> 
      <th>Email</th> 
      <th>Korisnička grupa</th> 
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
<?php echo $users->links(); ?>
<div class="Buttons">
  <input type="button" id="Change" class="btn" name="Change" value="Izmijeni podatke"></input>
  <input type="button" id="Delete" class="btn" name="Change" value="Izbriši korisnika"></input>
</div>

<div id="myModal" class="modal hide fade">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Izmijena korisnika</h3>
  </div>
  <div class="modal-body">
    <input type="hidden" name="hidden" id="hidden"></input>
    <div class="control-group">
      <label class="control-label" for="inputUsername">Korisničko ime:</label>
    <div class="controls">
      <input type="text" id="inputUsername" placeholder="Username">
    </div>
     </div>
    <div class="control-group">
      <label class="control-label" for="inputEmail">Email:</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Email">
    </div>
     </div>
      <div class="control-group">
      <label class="control-label" for="inputAddress">Adresa:</label>
    <div class="controls">
      <input type="text" id="inputAddress" placeholder="Address">
    </div>
     </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Šifra:</label>
    <div class="controls">
      <input type="password" id="inputPassword" placeholder="Password">
    </div>
  </div>
   <label class="control-label" for="inputUsername">Korisnička grupa:</label>
<select id="userRole">
  <option >Administrator</option>
  <option >Korisnik</option>
  <option >Aviokompanija</option>
</select>
<div class="Company">
 <label class="control-label" for="inputCompany">Naziv kompanije:</label>
    <div class="controls">
      <input type="text" id="inputCompany" placeholder="New Company">
      <br>
      <a href="" id="ChoseCompany" class="btn btn-primary">Izaberite već postojeću</a>
    </div>
    <div id="CompanyList">
  <select id="ChosedCompany">
  </select>
  </div>
</div>
  <div class="modal-footer">
    <a href="" class="btn">Close</a>
    <a href="" id="SaveChange" class="btn btn-primary">Save changes</a>
  </div>



@endsection