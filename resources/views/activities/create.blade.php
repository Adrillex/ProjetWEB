@extends('layouts.app')
@section('content')
    <div class="content">
        {!! Form::open(['route' => 'activities.store', 'files' => true])  !!}
        <div class="col-md-6 col-md-offset-1">
            <div class="form-group">
                {!! Form::label('title', 'titre de l\'activité') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('content', 'Description de l\'activité') !!}
                {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('price', 'Prix (laisser 0 si gratuit)') !!}
                {!! Form::number('price', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('image', 'Image :') !!}
                {!! Form::file('image') !!}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="panel panel-default" style="margin-top: 40px">
                    <div class="panel-heading" style="text-align: center">
                        <div class="form-group" style="text-align: right; display: inline-block; margin-bottom: 0px">
                            {!! Form::label('numberDay', 'Activité récurrente ? (en jours)', ['class' => 'col-md-8', 'style' => 'margin-top: 6px']) !!}
                            <div class="col-md-4">
                                {!! Form::number('numberDay', null, ['class' => 'form-control', 'id' => 'numberDay']) !!}
                            </div>
                        </div>
                        <hr>
                        <div class="dropdown" style="text-align: center">
                            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Date(s) à proposer
                                <span class="caret"></span></button>
                            <button class="btn btn-success" data-toggle="pill" onclick="addDate();">Ajouter une date</button>
                            <ul class="dropdown-menu">
                                <li>
                                    <ul class="nav nav-pills" id="dropmenupick">
                                        <li class="active"><a data-toggle="pill" href="#datetimepicker1">Date n°1</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="panel-body">
                        <div class="tab-content" id="datemenu">
                            <div class="input-group date tab-pane fade in active" id="datetimepicker1">
                                {!! Form::hidden('date[0]', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::submit('envoyer', ['class' => 'btn btn-primary pull-right', 'step' => '0,01']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            var date_input=$('#datetimepicker1'); //our date input has the name "date"
            date_input.datetimepicker({
                useCurrent: false, //Important! See issue #1075
                locale: 'fr',
                format: 'YYYY-MM-DD HH:mm',
                inline: true,
                sideBySide: true

            });
        })
        var $i = 2;
        function addDate() {
            $("#numberDay").prop("value", null);
            $("#numberDay").prop("disabled", true);
            //var $picker = $('<div> <p>coucou' + $i + '</p> un test </div>');
            var $picker = $('<div class="input-group date tab-pane fade in activate" id="datetimepicker' + $i + '"> <input class="form-control" name="date[' + ($i-1) + ']" type="hidden"> </div>');
            $picker.appendTo($("#datemenu"));
            var $dropdown = $('<li><a data-toggle="pill" href="#datetimepicker' + $i + '">date n°' + $i + '</a></li>');
            $dropdown.appendTo($("#dropmenupick"));

            var date_input=$('#datetimepicker' + $i); //our date input has the name "date"
            date_input.datetimepicker({
                useCurrent: false, //Important! See issue #1075
                locale: 'fr',
                format: 'YYYY-MM-DD HH:mm',
                inline: true,
                sideBySide: true

            });
            $i++;
        }
    </script>
@endsection