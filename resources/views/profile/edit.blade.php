@extends('layouts.app')
@section('content')
    <div class="content">
        <h2 class="col-md-6 col-md-offset-3">Editer votre profil</h2>
        {!! Form::open(['method' => 'put', 'route' => ['profile.update', $user]]) !!}
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                {!! Form::label('name', 'Prénom : ') !!}
                {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('surname', 'Nom : ') !!}
                {!! Form::text('surname', $user->surname, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'E-Mail : ') !!}
                {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
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