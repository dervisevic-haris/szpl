@extends('layout.default')

@section('Title')
Registracija
@endsection

@section('MainContent')
	<form class="form-horizontal" role="form" method="POST" action="">
        <div class="form-group">
            <label class="col-sm-2 control-label">Korisničko ime:&nbsp;&nbsp;</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="username"><br>
            </div>
        </div><br>
        <div class="form-group">
            <label class="col-sm-2 control-label">Korisnička šifra:&nbsp;&nbsp;</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="password">
            </div>
        </div><br>
        <div class="form-group">
            <label class="col-sm-2 control-label">Ime:&nbsp;&nbsp;</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="firstName">
            </div>
        </div><br>
        <div class="form-group">
            <label class="col-sm-2 control-label">Prezime:&nbsp;&nbsp;</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="lastName">
            </div>
        </div><br>
        <div class="form-group">
            <label class="col-sm-2 control-label">Email:&nbsp;&nbsp;</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="email">
            </div>
        </div><br>
        <div class="form-group">
            <label class="col-sm-2 control-label">Broj kreditne kartice:&nbsp;&nbsp;</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="creditCardNumber">
            </div>
        </div><br>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-default">Potvrdi</button>
                &nbsp;&nbsp;
                <button type="button" class="btn btn-default">Odustani</button>
            </div>
        </div>
    </form>
@endsection