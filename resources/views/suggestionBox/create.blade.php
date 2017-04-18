@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            {!! Form::open(['route' => 'suggestionBox.store']) !!}

            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                {!! Form::label('title', 'Titre') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
                @if($errors->has('title'))
                    <span class="help-block"><strong>{{$errors->first('title')}}</strong></span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                {!! Form::label('category_id', 'Catégorie') !!}
                {!! Form::select('category_id', array( 1 => 'Leopard'), ['class' => 'form-control']) !!}
                @if($errors->has('title'))
                    <span class="help-block"><strong>{{$errors->first('title')}}</strong></span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                {!! Form::label('content', 'Contenu') !!}
                {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
                @if($errors->has('content'))
                    <span class="help-block"><strong>{{$errors->first('content')}}</strong></span>
                @endif
            </div>



            {!! Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right']) !!}
            {!! Form::close() !!}

        </div>
    </div>
@endsection