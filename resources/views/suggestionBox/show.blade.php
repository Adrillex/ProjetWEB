@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('suggestionBox.index') }}" class = "btn btn-primary">Retourner à l'index</a>

        <h3>{{ $suggestion->title }}</h3>
        <p>{{ 'Une idée de ' }}{{ $user->name}} {{$user->surname }}</p>
        <p>{{ $suggestion->content }}</p>
        <p>{{ $suggestion->created_at->diffForHumans() }}</p>

        @if(isset($liked))
            @if($liked == 0)
                {{ "Vous n'avez pas aimé cette idée. Peut-être avez-vous changé d'avis?" }}
                {!! Form::open(['method' => 'PUT', 'route' => ['likeSuggestion.update', $suggestion]]) !!}
                    {!! Form::button("J'aime!") !!}
                {!! Form::close() !!}
            @elseif($liked == 1)
                {{ "Vous avez aimé cette idée. Peut-être avez-vous changé d'avis?" }}
                {!! Form::open(['method' => 'PUT', 'route' => ['likeSuggestion.update', $suggestion]]) !!}
                    {!! Form::button("Je n'aime pas!") !!}
                {!! Form::close() !!}
            @endif
            {!! Form::open(['method' => 'DELETE', 'route' => ['likeSuggestion.destroy', $suggestion]]) !!}
                {!! Form::button("Peu m'importe") !!}
            {!! Form::close() !!}
        @else
            {{ "Que pensez-vous de cette idée?" }}
            {!! Form::open(['route' => ['likeSuggestion.store', $suggestion]]) !!}
                {!! Form::hidden('suggestion_id', $suggestion->id) !!}
                {!! Form::submit("J'aime!", ['class' => 'btn btn-info', 'name' => 'state']) !!}
                {!! Form::submit("Je n'aime pas!", ['class' => 'btn btn-warning', 'name' => 'state']) !!}
            {!! Form::close() !!}
        @endif


        <a href="{{ route('suggestionBox.store', $suggestion) }}" class="btn btn-primary">Éditer la news.</a>
        {!! Form::open(['method' => 'DELETE', 'route' => ['suggestionBox.destroy', $suggestion]]) !!}
            {!! Form::submit('Supprimer', ['class' => 'btn btn-danger pull-right']) !!}
        {!! Form::close() !!}
    </div>
@endsection