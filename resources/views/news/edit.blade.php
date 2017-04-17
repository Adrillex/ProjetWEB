@extends('layouts.app')
@section('content')
    <div class="content">
        <h2 class="col-md-6 col-md-offset-3">Créer une nouvelle New</h2>
        {!! Form::open(['method' => 'put', 'route' => ['news.update', $new]]) !!}
        {!! Form::hidden('id_user', $id_user) !!}
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                {!! Form::label('title', 'Titre de l\'article') !!}
                {!! Form::text('title', $new->title, ['class' => 'form-control', 'placeholder' => 'Entrez un titre']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('content', 'Contenu de l\'article') !!}
                {!! Form::textarea('content', $new->content, ['class' => 'form-control', 'placeholder' => 'Ecrivez votre article']) !!}
            </div>
        </div>
        <div class="col-md-1 col-md-offset-8">
            <div class="form-group">
                {!! Form::submit('Valider', ['class' => 'btn btn-primary pull-right']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection