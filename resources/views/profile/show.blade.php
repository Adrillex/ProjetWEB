@extends('layouts.app')

@section('content')
    <div class="col-md-6 col-md-offset-3">
        <div class="form-group">
            <h3>{!! Form::label('Name', $user->name) !!}</h3>
            <p>{!! Form::label('email', $user->email) !!}</p>
            <p>{!! Form::label('surname', $user->surname) !!}</p>
            <p>{!! Form::label('status', $user->status) !!}</p>
            <p><a href="{{'home'}}" class="btn btn-primary">Retour au menu</a></p>
        </div>

    </div>
@endsection