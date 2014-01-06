@extends('layout.default')

@section('content')
Dobrodošli
@endsection
@if(BaseController::getUserRole(Auth::user()->id)=="Administrator")
@section('mainLink')
Podešavanja
@endsection
@endif

@section('link1.1')
Pregled svih korisnika
@endsection
@section('link1.2')
Pregled korisničkih grupa
@endsection



@section('Poruka')
{{ $name }}
@endsection

@section('AdminLinks')
	 <li class="dropdown">
							 <a class="dropdown-toggle" data-toggle="dropdown" href="" >   <i class="caret"> </i>
							 	Podešavanja
							 </a>
									<ul class="dropdown-menu">
										<li><a href="/project/szpl/public/home/users/showusers"> @yield('link1.1') </a></li>
										<li><a href="/project/szpl/public/home/users/usergroups">@yield('link1.2')</a></li>
									</ul>
						  </li>
@endsection

@section('mainContent')
 <div class="navbar navbar-fixed-bottom">
        <div class="navbar-inner">
            <div class="container">
                  <p class="muted"> SZRIPL</p>
            </div>
        </div>
    </div>
@endsection
