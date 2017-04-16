@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="col-md-6 col-md-offset-3">
            {!! Form::open(['route' => 'activities.store'])  !!}
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
            {!! Form::submit('envoyer', ['class' => 'btn btn-primary pull-right', 'step' => '0,01']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection