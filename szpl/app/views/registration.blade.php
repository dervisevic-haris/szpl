@extends('layout.default')

@section('mainContent')
<link href="css/registration.css" rel="stylesheet">
<script src="http://code.jquery.com/jquery.js"></script>
<script>
    $( document ).ready(function() {
        $("#CancelBtn").on("click", function(e){
            var url = $("#CancelBtn").attr("action");
             window.location = "/project/szpl/public";
        });
    });
</script>
<div class="container">
    <div class="row">
            <div class="Container">
            <h1 class="login-title">Registration</h1>
            <div class="account-wall" id="ControlGroup">
                <form class="form-signin" id="loginForm" method="POST" action="/project/szpl/public/registration">
                <label class="control-label" for="inputUsername" >Username:</label>
                    <input type="text" class="form-control" id="inputUsername" name="username" placeholder="Username" required>
                <label class="control-label" for="" >Password:</label> 
                    <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password" required>
                <label class="control-label" for="" >Retype Password:</label> 
                    <input type="password" class="form-control" name="passwordRetyped" id="inputPassword" placeholder="Password" required>
                 <label class="control-label" for="inputEmail" >Email:</label>
                    <input type="text" class="form-control" id="inputEmail" name="email" placeholder="Email" required>
                <label class="control-label" for="inputEmail" >Address:</label>
                    <input type="text" class="form-control" id="inputEmail" name="address" placeholder="Address" required>
                   <div id="buttons">
                    <button class="btn btn-lg btn-primary" type="submit" id="loginBtn">
                      Submit</button>
                    <button class="btn btn-danger" type="button" id="CancelBtn" action="/">
                      Cancel</button> 
                    </div>
                </form>

            <div class="onsucess">
             @if(isset($success))
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                 <div class="alert alert-success .alert-dismissable" >Uspijesno ste se registrovali</div>   
            @endif
            </div>

            <div class="onerror">
             @if(isset($error)) 
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <div class="alert alert-danger .alert-dismis" id="error"><?php
                        if(isset($error))
                            echo $error;
                    ?>
                    </div>
                @endif
            </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection