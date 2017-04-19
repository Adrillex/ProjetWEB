@extends('layouts.app')

@section('content')
    <div class="col-md-6 col-md-offset-3">
        <div class="form-group">
            <h3>{!! Form::label('title', $new->title) !!}</h3>
            <p>{!! Form::label('content', $new->content) !!}</p>
            <p><a href="{{route('news.index', $new)}}" class="btn btn-primary">Retour au menu</a></p>
        </div>
        @if (Auth::check() and Auth::user()->status === 2)
        <div class="col-md-offset-8">
            <p>{!! Form::open(['method' => 'DELETE','route' => ['news.destroy', $new->id]]) !!}
                {!! Form::submit('Supprimer cet article ?', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}</p>
            <p><a href="{{route('news.edit', $new)}}" class="btn btn-primary">Editer l'article</a></p>
        </div>
        @endif
    </div>
@endsection