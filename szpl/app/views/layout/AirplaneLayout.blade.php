@extends('layout.CompanyLayout')

@section('Title')
{{
	Auth::user()->username;
}}
@endsection

@section('CompanyLinks')

 <li class="dropdown">
	<a class="dropdown-toggle" data-toggle="dropdown" href="" >   <i class="caret"> </i>
		Podesavanja
	</a>
		<ul class="dropdown-menu">
			<li><a href="/project/szpl/public/home/airplanes"> Avioni </a></li>
			<li><a href="/project/szpl/public/home/flights">Letovi</a></li>
		</ul>
</li>
 <li class="dropdown">
	<a class="dropdown-toggle" data-toggle="dropdown" href="" >   <i class="caret"> </i>
		Avioni
	</a>
		<ul class="dropdown-menu">
			<li><a href="/project/szpl/public/home/airplanes/create">Kreiranje aviona </a></li>
			<li><a href="/project/szpl/public/home/airplanes/update">Ažuriranje aviona</a></li>
			<li><a href="/project/szpl/public/home/airplanes/delete">Brisanje aviona</a></li>
		</ul>
</li>
@endsection