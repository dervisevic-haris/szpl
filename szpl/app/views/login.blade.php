@extends('layout.default')

@section('mainContent')

<style type="text/css">
.Container {
    top:320px;
    width: 40%;
    position: absolute;
    left:30%;
    right: 25%;
    background-image: linear-gradient(315deg, #fefefe, rgba(0,0,30,0.5));
    border-radius: 20px;
}
#inputPassword{
    display: block;
    position: relative;
    margin-right: 20%;
    margin-left: 25%;
    width: 300px;
}
#inputUsername {
    display: block;
    position: relative;
    margin-right: 20%;
    margin-left: 25%;
    width: 300px;

}
#loginBtn {
    position: relative;
   width: 150px;
   margin-left: 25%;

}
#linkCA {
    margin-right: 10%;
}

</style>
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
<div class="container">
    <div class="row">
        <div class="Container">
            <h1 class="text-center login-title">Sign in</h1>
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
@endsection