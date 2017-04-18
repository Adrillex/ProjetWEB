@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('activities.create') }}" class="btn btn-primary">Creer une nouvelle Activité</a>
        @foreach($activities as $activity)
            @if(!$loop->first)
                <hr>
            @endif
            <a href="{{ route('activities.show', $activity) }}"><h3>{{ $activity->title }}</h3></a>
        @endforeach
    </div>
@endsection
