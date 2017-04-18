@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('suggestionBox.index') }}" class = "btn btn-primary">Retourner à l'index</a>

        <h3>{{ $suggestion->title }}</h3>
        <p>{{ 'Une idée de ' }}{{ $user->name}} {{$user->surname }}</p>
        <p>{{ $suggestion->content }}</p>
        <p>{{ $suggestion->created_at->diffForHumans() }}</p>

        <a href="{{ route('suggestionBox.edit', $suggestion) }}" class="btn btn-primary">Éditer la news.</a>
        {!! Form::open(['method' => 'DELETE', 'route' => ['suggestionBox.destroy', $suggestion]]) !!}
            {!! Form::submit('Supprimer', ['class' => 'btn btn-danger pull-right']) !!}
        {!! Form::close() !!}
    </div>
@endsection