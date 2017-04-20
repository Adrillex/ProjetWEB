@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Auth::check())
            <a href="{{ route('suggestionBox.create') }}" class = "btn btn-primary">J'ai une idée!</a>
        @endif
        @foreach($suggestionList as $suggestion)
            @if(!$loop->first)
                <hr>
            @endif
            <a href="{{ route('suggestionBox.show', $suggestion)}}"><h3>{{ $suggestion->title }}</h3></a>
            <p>{{ 'Une idée de ' }}{{ $user[$suggestion->user_id]->name}} {{$user[$suggestion->user_id]->surname }}</p>
            <p>{{ $suggestion->content }}</p>
            <p>{{$textList[$suggestion->id]}}</p>
            <p>{{ $suggestion->created_at->diffForHumans() }}</p>
        @endforeach

    </div>

@endsection