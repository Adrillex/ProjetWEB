@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            {!! Form::model($category, ['route' => ['categories.update', $category], 'method' => 'PUT']) !!}
            <div class="form-group{{ $errors->has('name') ? 'has-errors' : '' }}">
                {!! Form::label('name', 'Nom de la catégorie') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                @if($errors->has('name'))
                    <span class="help-block">
                        <strong> {{ $errors->has('name') }}</strong>
                    </span>
                @endif
            </div>

            {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary pull-right']) !!}
            {!! Form::close() !!}
        </div>
    </div>

@endsection