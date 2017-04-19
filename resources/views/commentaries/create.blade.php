@extends('layouts.app')
@section('content')
    <div class="content">
        <h2 class="col-md-6 col-md-offset-3">Ajouter un commentaire</h2>
        {!! Form::open(['route' => 'commentaries.store']) !!}
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                {!! Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => "N'oubliez pas de rester courtois en toute circonstance."]) !!}
            </div>
        </div>
        <div class="col-md-1 col-md-offset-8">
            <div class="form-group">
                {!! Form::submit('Valider', ['class' => 'btn btn-primary pull-right']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection