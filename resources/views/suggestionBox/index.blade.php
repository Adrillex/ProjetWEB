@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('news.create') }}" class = "btn btn-primary">Ajouter une nouvelle idée</a>
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