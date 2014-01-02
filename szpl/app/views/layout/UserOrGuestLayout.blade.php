@extends('layout.default')
@section('content')
Dobrodosli
@endsection
@section('mainLink')
Rezervacija leta
@endsection
@section('link1.1')
Rezervacija leta
@endsection
@section('link1.2')
About
@endsection

@section('Poruka')
@if(isset($name))
{{
	$name
}}
@endif
@endsection

@section('UserOrGuestLinks')
	 <li class="dropdown">
							 <a class="dropdown-toggle" data-toggle="dropdown" href="" >   <i class="caret"> </i>
							 	Rezervacije
							 </a>
									<ul class="dropdown-menu">
										<li><a href="/project/szpl/public/home/flightreservation"> @yield('link1.1') </a></li>
										<li><a href="/project/szpl/public/home/about">@yield('link1.2')</a></li>
									</ul>
	 </li>
@endsection


