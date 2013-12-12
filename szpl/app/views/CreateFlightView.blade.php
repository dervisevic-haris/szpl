@extends('layout.FlightLayout')

@section('mainContent')

<script src="http://code.jquery.com/jquery.js"></script>

<script>
    $( document ).ready(function() {
        $("#CancelBtn").on("click", function(e){
            var url = $("#CancelBtn").attr("action");
             window.location = "/project/szpl/public";
        });
    });
</script>
<style type="text/css">

</style>

<div class="container">
    <div class="row">
            <div class="Container">
            <h1 class="login-title">Kreiranje leta</h1>
            <div class="account-wall" id="ControlGroup">
                <div class="TopInfo">
                <form class="form-horizontal" id="loginForm" method="POST" action="/project/szpl/public/flights/create">
                    <label class="control-label" for="inputFlightName" id="nl">Naziv leta:</label>
                    <input type="text" class="form-control" id="inputFlightName" name="flightname" placeholder="FlightName" required>
                    <label class="control-label" for="" >Polazište:</label> 
                    <input type="text" class="form-control" name="from" id="inputFrom" placeholder="From" required>
                    <label class="control-label" for="" >Odredište:</label> 
                    <input type="text" class="form-control" name="to" id="inputTo" placeholder="To" required>
                    <label class="control-label" id="cl" for="inputDepartureDate">Datum polaska:</label>
                    <div class="well">
                        <div id="datetimepicker3" class="input-append date">
                            <input data-format="dd/MM/yyyy hh:mm:ss" type="text"></input>
                            <span class="add-on">
                                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                            </span>
                        </div>
                    </div>
                    </div>
                    <script type="text/javascript">
                        $(function() {
                            $('#datetimepicker3').datetimepicker({
                                language: 'pt-BR'
                            });
                        });
                    </script>
                    <label class="control-label" for="inputDepartureTime">Vrijeme polaska:</label>
                    <div class="well">
                        <div id="datetimepicker2" class="input-append date">
                            <input data-format="dd/MM/yyyy hh:mm:ss" type="text"></input>
                            <span class="add-on">
                                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                            </span>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $(function() {
                            $('#datetimepicker2').datetimepicker({
                                language: 'pt-BR'
                            });
                        });
                    </script>
                    <label class="control-label" for="inputArrivalDate">Datum dolaska:</label>
                    <div class="well">
                        <div id="datetimepicker3" class="input-append date">
                            <input data-format="dd/MM/yyyy hh:mm:ss" type="text"></input>
                            <span class="add-on">
                                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                            </span>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $(function() {
                            $('#datetimepicker3').datetimepicker({
                                language: 'pt-BR'
                            });
                        });
                    </script>
                    <label class="control-label" for="inputArrivalTime">Vrijeme dolaska:</label>
                    <div class="well">
                        <div id="datetimepicker2" class="input-append date">
                            <input data-format="dd/MM/yyyy hh:mm:ss" type="text"></input>
                            <span class="add-on">
                                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                            </span>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $(function() {
                            $('#datetimepicker2').datetimepicker({
                                language: 'pt-BR'
                            });
                        });
                    </script>
                    <label class="control-label" for="inputPrice">Cijena karte:</label>
                    <input type="text" class="form-control" id="inputPrice" name="price" placeholder="Price" required>
                    
                    <label class="control-label" for="inputPlane" >Avion:</label>
                    <select class="selectpicker">
                  
                    </select>

                    <div id="buttons">
                        <button class="btn btn-lg btn-primary" type="submit" id="loginBtn">Submit</button>
                        <button class="btn btn-danger" type="button" id="CancelBtn" action="/">Cancel</button>
                    </div>
                </form>

                <div class="onsucess">
                    @if(isset($success))
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <div class="alert alert-success .alert-dismissable" >Uspješno ste se kreirali let.</div>   
                    @endif
                </div>

                <div class="onerror">
                    @if(isset($error)) 
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <div class="alert alert-danger .alert-dismis" id="error">
                            <?php
                            if(isset($error))
                                echo $error;
                            ?>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection