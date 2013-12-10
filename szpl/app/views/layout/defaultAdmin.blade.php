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




