@extends('layout.default')

@section('mainContent')
<style type="text/css">
.Container {
    top:250px;
    width: 50%;
    position: absolute;
    left:22%;
    right: 25%;
}

#inputUsername {
    position: relative;
    width: 300px;
}
#inputPassword {
    display: block;
      width: 300px;
}
#inputEmail {
    display: block;
      width: 300px;
}

#loginBtn {
    position: absolute;
    width: 150px;
}
#linkCA {

}
#CancelBtn{
    position: absolute;
    width: 150px;
    left:170px;
}
#ControlGroup {
    position: relative;
    margin-right: 50px;
    margin-left: 200px;
}
.login-title {
    position: relative;
    margin-left: 195px;
}
#loginForm {
    position: relative;
    top:25px;
}
#buttons {
    position: relative;
    top:25px;
}
#error {
    position: absolute;
    top:410px;
    width: 80%;
}
.onsucess {
    position: relative;
    margin-top: 110px;
}
</style>
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
                    <button class="btn btn-danger" type="button" id="CancelBtn" action="/project/szpl/public">
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