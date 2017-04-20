@extends('layouts.app')

@section('content')
@if (Auth::check() and Auth::user()->id != $user->id)
<meta http-equiv="refresh" content="0; url=/error"/>
@else
<h2 class="col-md-6 col-md-offset-3">Votre profil</h2>
<div class="col-md-6 col-md-offset-3">
    <div class="form-group">
        <p>
            {!! Form::label('Name', 'Prénom : ') !!}
            {!! Form::label('Name', $user->name) !!}
        </p>
        <p>
            {!! Form::label('surname', 'Nom : ') !!}
            {!! Form::label('surname', $user->surname) !!}
        </p>
        <p>
            {!! Form::label('email', 'Mail : ') !!}
            {!! Form::label('email', $user->email) !!}
        </p>
        @if($user->status == 1)
        <p>{!! Form::label('status', 'Vous êtes un étudiant lambda du BDE') !!}</p>
        @elseif($user->status == 2)
        <p>{!! Form::label('status', 'Vous êtes membre du BDE') !!}</p>
        @elseif($user->status == 3)
        <p>{!! Form::label('status', 'Vous êtes membre du CESi') !!}</p>
        @endif
        <div class="col-md-offset-8">

            <p>
                <a href="{{url('home')}}" class="btn btn-primary">Retour au menu</a>
            </p>
            <p>
                <a href="{{route('profile.edit', $user)}}" class="btn btn-primary">Editer le profil</a>
            </p>

            <p>{!! Form::open(['method' => 'DELETE','route' => ['profile.destroy', $user->id]]) !!}
                {!! Form::submit('Supprimer votre profil ?', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}</p>
        </div>
    </div>

</div>
@endif

@endsection