@extends('layouts.app')

@section('content')
    <div class="col-md-offset-2">
        @foreach($news as $new)
            <h3>{{$new->title}}</h3>
            <p>{{$new->content}}</p>
        @endforeach
    </div>
    <div class="content">

        <div class="col-md-1 col-md-offset-8">
            <a href="{{route('news.create')}}" class="btn btn-primary">Créer une New</a>
        </div>
    </div>
@endsection