@extends('layout.default')

@section('Title')
{{
	Auth::user()->username;
}}
@endsection

@section('Poruka')
{{ $name }}
@endsection

@section('CompanyLinks')
 <li class="dropdown">
	<a class="dropdown-toggle" data-toggle="dropdown" href="" >   <i class="caret"> </i>
		Podešavanja
	</a>
		<ul class="dropdown-menu">
			<li><a href="/project/szpl/public/home/airplanes"> Avioni </a></li>
			<li><a href="/project/szpl/public/home/flights">Letovi</a></li>
		</ul>
</li>
@endsection





