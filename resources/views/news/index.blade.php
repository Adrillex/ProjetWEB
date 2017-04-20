@extends('layouts.app')

@section('content')
    <div class="content">
        @foreach($news->reverse() as $id=>$new)
            <div class="col-md-offset-2">
                <h3><a href={{route('news.show', $new)}}>{{$new->title}}</a></h3>
                <p>{{$new->content}}</p>
            </div>
        @endforeach
    </div>
    @if(isset(Auth::user()->id) && Auth::user()->status == 2)
        <div class="content">
            <div class="col-md-offset-8">
                <a href="{{route('news.create')}}" class="btn btn-primary">Créer une News</a>
            </div>
        </div>
    @endif
@endsection