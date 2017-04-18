@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('suggestion.create') }}" class = "btn btn-primary">J'ai une idée!</a>
        @foreach($suggestionList as $suggestion)
            @if(!$loop->first)
                <hr>
            @endif
            <a href="{{ route('suggestionBox.show', $suggestion)}}"><h3>{{ $suggestion->title }}</h3></a>
            <p>{{ $suggestion->author }}</p>
            <p>{{ $suggestion->content }}</p>
            <p> {{ $suggestion->created_at->diffForHumans() }}</p>
        @endforeach

    </div>

@endsection