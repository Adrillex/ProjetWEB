@extends('layouts.app')

@section('content')
    <div class="col-md-6 col-md-offset-3">
        <div class="form-group">
            <h3>{!! Form::label('title', $new->title) !!}</h3>
            <p>{!! Form::label('content', $new->content) !!}</p>
            <p><a href="{{route('news.index', $new)}}" class="btn btn-primary">Retour au menu</a></p>
        </div>

    </div>
@endsection