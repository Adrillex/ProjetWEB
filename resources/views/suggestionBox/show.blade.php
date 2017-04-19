@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('suggestionBox.index') }}" class = "btn btn-primary">Retourner à l'index</a>

        <h3>{{ $suggestion->title }}</h3>
        <p>{{ 'Une idée de ' }}{{ $user->name}} {{$user->surname }}</p>
        <p>{{ $suggestion->content }}</p>
        <p>{{ $suggestion->created_at->diffForHumans() }}</p>
        <div class="container">
            <p>{{ $text }}</p>
            @if(isset($liked))
                {!! Form::open(['method' => 'PUT', 'route' => ['likeSuggestion.update', $suggestion]]) !!}
                    {!! Form::hidden('suggestion_id', $suggestion->id) !!}
                    @if($liked->isLiking == 0)
                        {{ "Vous n'avez pas aimé cette idée. Peut-être avez-vous changé d'avis?" }}<br>
                        {!! Form::submit("J'aime!", ['class' => 'btn btn-info', 'name' => 'state']) !!}
                    @else
                        {{ "Vous avez aimé cette idée. Peut-être avez-vous changé d'avis?" }}<br>
                        {!! Form::submit("Je n'aime pas!", ['class' => 'btn btn-warning', 'name' => 'state']) !!}
                @endif
                {!! Form::close() !!}

                {!! Form::open(['method' => 'DELETE', 'route' => ['likeSuggestion.destroy', $suggestion]]) !!}
                    {!! Form::submit("Peu m'importe", ['class' => 'btn']) !!}
                    {!! Form::hidden('suggestion_id', $suggestion->id) !!}
                {!! Form::close() !!}
            @else
                {{ "Que pensez-vous de cette idée?" }}
                {!! Form::open(['route' => ['likeSuggestion.store', $suggestion]]) !!}
                    {!! Form::hidden('suggestion_id', $suggestion->id) !!}
                    {!! Form::submit("J'aime!", ['class' => 'btn btn-info', 'name' => 'state']) !!}
                    {!! Form::submit("Je n'aime pas!", ['class' => 'btn btn-warning', 'name' => 'state']) !!}
                {!! Form::close() !!}
            @endif
        </div>

        {!! Form::open(['method' => 'DELETE', 'route' => ['suggestionBox.destroy', $suggestion]]) !!}
            {!! Form::submit('Supprimer', ['class' => 'btn btn-danger pull-right']) !!}
        {!! Form::close() !!}

        @if(Auth::user()->status == 2)
            {!! Form::model(['route' => ['suggestionBox.update', $suggestion], "method" => "PUT"]) !!}
                {!! Form::select('status', $statusList, ['class' => 'form-control']) !!}
                {!! Form::submit("Valider", ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        @endif
    </div>
@endsection