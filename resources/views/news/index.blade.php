@extends('layouts.app')

@section('content')
    <div class="content">
        @foreach($news as $new)
            <div class="col-md-offset-2">
                <h3><a href={{route('news.show', $new)}}>{{$new->title}}</a></h3>
                <p>{{$new->content}}</p>
            </div>
            <div class="col-md-offset-8">
                <p>{!! Form::open(['method' => 'DELETE','route' => ['news.destroy', $new->id]]) !!}
                {!! Form::submit('Supprimer cet article ?', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}</p>
                <p><a href="{{route('news.edit', $new)}}" class="btn btn-primary">Editer l'article</a></p>
            </div>
        @endforeach
    </div>
    <div class="content">
        <div class="col-md-offset-8">
            <a href="{{route('news.create')}}" class="btn btn-primary">Créer une New</a>
        </div>
    </div>
@endsection