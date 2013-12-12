@extends('layout.default')


@section('links')
<style type="text/css"></style>
<link href="css/login.css" rel="stylesheet">
 <script src="http://code.jquery.com/jquery.js"></script>
<script>
      $( document ).ready(function() {
        $("#loginBtn").on("click", function(e){
            e.preventDefault();
            var password = $("#inputPassword").val();
            var email = $("#inputUsername").val();
            var url = $("#loginForm").attr("action");
            $.ajax({               //Login preko ajaxa, (experimentisanje da se u slucaju pogresnih unosa ne refresuje cijela stranica)
                type:"POST",
                url:url,
                dataType:"json",
                data: {
                    name :email,
                    password : password
                },
                success: function(data){
                    if (data.success){
                        window.location = data.redirectUrl;
                    }   
                    else{
                        $("#LoginError").show();
                        $("#LoginError").html(data.message);

                    }           
                },
                complete:function(data){    
                },
                error:function(data){
                        alert("Desila se greska " + data.message);

                }
            });

        });
    });
</script>
<STYLE TYPE="text/css">
#label1 {
    position: absolute;
    top:32%;
    left:5.5%;
}
#label2 {
    position: absolute;
    top:57%;
    left:5%;
}

</STYLE>
@endsection

@section('mainContent')

<div class="container">
    <div class="row">
        <div class="Container">
            <h1 class="text-center login-title">Sign in</h1>
            <div class="account-wall" id="ControlGroup">
                 <form class="form-signin" id="loginForm" method="POST" action="/project/szpl/public/login">
                <div class="form-group">
                <label class="control-label" id="label1">Korisničko ime:&nbsp;&nbsp;</label>
                <input type="text" class="form-control" id="inputUsername" name="name" placeholder="Username" required autofocus>
                </div>
                <div class="form-group">
                <label class="control-label" id="label2">Korisnička šifra:&nbsp;&nbsp;</label>
                <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password" required>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit" id="loginBtn">
                    Sign in</button>
                </form>
                     <div class="alert alert-danger" id="LoginError"></div>
            </div>
        </div>
    </div>
</div>
@endsection