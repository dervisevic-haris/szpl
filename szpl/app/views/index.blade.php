<!DOCTYPE html>
<html>
  <head>
    <title>Bootstrap 101 Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/bootstrap-responsive.css" rel="stylesheet" media="screen">
    <meta charset="utf-8">
    <script src="/js/jquery-1.10.2.js"></script>
    <script >
    $( document ).ready(function() {
  		$("#loginBtn").on("click", function(e){
			e.preventDefault();
			var password = $("#inputPassword").val();
			var email = $("#inputEmail").val();
			var url = $("#loginForm").attr("action");
			$.ajax({
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
						alert(data.message);

						$("#LoginError").show();
						$("#LoginError").append(data.message);

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
  </head>
 <style>
 #LoginError {
 	display: none;
 }
.omotaj {
    display:inline-block;
    width:400px
    resize:none;
}
.control-group .controls #btn {
	margin-left:75px;
}
.radio-inline label {
	display: block;
}
.controls #regsubmit {
	margin-left: 5px;
}

</style>
  <body>
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">  <!-- Obicni kontjenerski div,u  njemu je sve sto se nalazi u navbaru -->
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <!-- btn btn-navbar klasa pravi button data-toogle- sluzi da se ovo dugme veze za odredjenu javaScriptu koja ce se izvrsiti nakon resise prozora-->
					<i class="icon-tasks"></i>
				</a>
				 <a class="brand" href="#">Sistem za praćenje letova</a>
					<div class="nav-collapse collapse">
						<ul class="nav pull-right">
							<li ><a href="#" > <i class="icon-home"></i> Pocetna</a></li>
							 <li class="dropdown">
							 <a class="dropdown-toggle" data-toggle="dropdown" href="#" > <i class="caret"> </i> Link </a>
								<ul class="dropdown-menu">
									<li><a href="http://localhost/laravel/public/login/ispisi">Link1.1</a></li>
									<li><a>Link1.2</a></li>
								</ul>
						  </li>
							 
							  <li><a href="#registracija" data-toggle="modal">Registracija</a></li>
							  <li><a href="#login" data-toggle="modal">Login</a></li>
						</ul>
					</div>
			</div>
		</div>
	</div>


      <div class="hero-unit">
		<div class="omotaj">
			  <h1>Dobrodošli</h1>
		</div>	 
      </div>
      <div class="container">
		<div class="row-fluid">	
			 <div class="span3">
				 <h4>Informacije 1</h4>
  					<div class="thumbnail">
    					 <img src="img/AVION_LAN.jpg" alt="">
    				 </div>
    				
  					<p> Upoznajte se sa nasom aplikacijom i pogledajte koje mogucnosti nudi. 
  						
  						</p>
					 <a href="#" class="btn btn-info"id="showUsers" role="button">Test buttn</a>

			 </div>  
		</div>
      </div>

      <div id="user"></div>


	<div class="navbar navbar-fixed-bottom">
		<div class="navbar-inner">
			<div class="container">
				  <p class="muted"> SZPL</p>
			</div>
		</div>
	</div>
	<div id="ura" class="modal hide fade">
		<div class="modal-header">
			<h3>Zaglavlje informacija</h3>
		</div>
		<div class="modal-body">
			<p>info</p>
		</div>
		<div class="modal-footer">
				<p>info</p>
		</div>
	</div>
	<div id="login" class="modal hide fade">
		<div class="modal-header">
			<h2>Login</h2>
		</div>

		<div class="modal-body">
			<form id="loginForm" class="form-horizontal" method="POST" action="/project/szpl/public/login">
				<div class="control-group">
					 <label class="control-label" for="inputEmail" >Email</label>
					 <div class="controls">
						<input type="text" id="inputEmail" name="name" placeholder="Email">
					 </div>
				</div>
				<div class="control-group">
					 <label class="control-label" for="inputPassword">Password</label>
					 <div class="controls">
					 	<input type="password" name="password" id="inputPassword" placeholder="Password">
					 </div>
				</div>
				<div class="control-group">
					<div class="controls">
								<button type="submit" class="btn" id="loginBtn">Sign in</button>
								<button class="btn" id="btn" data-dismiss="modal">Cancel</button>
					</div>
				</div>
				 <div class="alert alert-danger" id="LoginError"></div>
			</form>
			<div class="modal-footer">

			</div>
		</div>
	</div>
	
		
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>