@extends('layout.default')

@section('content')
Dobrodosli
@endsection
@if(BaseController::getUserRole(Auth::user()->id)=="Administrator")
@section('mainLink')
Podesavanja
@endsection
@endif

@section('link1.1')
Pregled svih korisnika
@endsection
@section('link1.2')
Korisnicke grupe
@endsection

@section('Poruka')
{{ $name }}
@endsection

@section('AdminLinks')
	 <li class="dropdown">
							 <a class="dropdown-toggle" data-toggle="dropdown" href="" >   <i class="caret"> </i>
							 	Podesavanja
							 </a>
									<ul class="dropdown-menu">
										<li><a href="/project/szpl/public/home/users"> @yield('link1.1') </a></li>
										<li><a href="/project/szpl/public/home/usergroups">@yield('link1.2')</a></li>
									</ul>
						  </li>
@endsection


