@extends('layout.default')
@section('links')
<style type="text/css"></style>
<link href="css/login.css" rel="stylesheet">
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
@endsection

@section('mainContent')

<div class="container">
    <div class="row">
        <div class="Container">
            <h1 class="text-center login-title">Prijava</h1>
            <div class="account-wall" id="ControlGroup">
                 <form class="form-signin" id="loginForm" method="POST" action="/project/szpl/public/login">
                <input type="text" class="form-control" id="inputUsername" name="name" placeholder="Username" required autofocus>
                <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit" id="loginBtn">
                    Sign in</button>
                </form>
                     <div class="alert alert-danger" id="LoginError"></div>
            </div>
        </div>
    </div>
</div>
 <div class="navbar navbar-fixed-bottom">
        <div class="navbar-inner">
            <div class="container">
                  <p class="muted"> SZRIPL</p>
            </div>
        </div>
    </div>
@endsection