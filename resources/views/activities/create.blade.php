@extends('layouts.app')
@section('content')
    <div class="content">
        {!! Form::open(['route' => 'activities.store'])  !!}
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

        </div>
        <div class="col-md-4">
            <div class="form-group">
                {!! Form::label('date', 'Date') !!}
                <div class="input-group date" id="datetimepicker1">
                    {!! Form::text('date', null, ['class' => 'form-control', 'name' => 'date']) !!}
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                {!! Form::submit('envoyer', ['class' => 'btn btn-primary pull-right', 'step' => '0,01']) !!}
            </div>
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

            });
        })
    </script>
@endsection