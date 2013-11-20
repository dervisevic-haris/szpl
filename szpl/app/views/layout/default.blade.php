<!DOCTYPE html>
<html>
  <head>
    <title>@yield('content')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/bootstrap-responsive.css" rel="stylesheet" media="screen">
    <meta charset="utf-8">
    <script src="/js/jquery-1.10.2.js"></script>
    <script >
    
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
							<li ><a href="/project/szpl/public/home" > <i class="icon-home"></i> Pocetna</a></li>
							 <li class="dropdown">
							 <a class="dropdown-toggle" data-toggle="dropdown" href="#" > <i class="caret"> </i> @yield('mainLink') </a>
								<ul class="dropdown-menu">
									<li><a href="http://localhost/laravel/public/login/ispisi"> @yield('link1.1') </a></li>
									<li><a>@yield('link1.2')</a></li>
								</ul>
						  </li>
						  	  @if (Auth::check())
							  <li><a href="#registracija" data-toggle="modal">@yield('Poruka')</a></li>
							  <li><a href="/project/szpl/public/logout" class="logoutLink" data-toggle="modal">Logout</a></li>
							  @else
							  <li><a href="#registracija" data-toggle="modal">Guest User</a></li>
							  <li><a href="/project/szpl/public/login" data-toggle="modal">Login</a></li>
							  <li><a href="/project/szpl/public/registration" data-toggle="modal">Registracija</a></li>
							  @endif
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
   
@yield('mainContent')


	
	<div id="login" class="modal hide fade">
		<div class="modal-header">
			<h2>Login</h2>
		</div>

		<div class="modal-body">
			<form id="loginForm" class="form-horizontal" method="POST" action="/project/szpl/public/login">
				<div class="control-group">
					 <label class="control-label" for="inputUsername" >Username</label>
					 <div class="controls">
						<input type="text" id="inputUsername" name="name" placeholder="Username">
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
		
	<div class="navbar navbar-fixed-bottom">
		<div class="navbar-inner">
		
		</div>
	</div>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
</html>
