@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            {!! Form::model($product, ['route' => ['products.update', $product], 'method' => 'PUT', 'files' => true]) !!}
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                {!! Form::label('name', 'Nom du produit :') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                @if($errors->has('name'))
                    <span class="help-block">
                        <strong> {{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                {!! Form::label('category_id', 'Choisissez la catégorie :') !!}
                {!! Form::select('category_id', $categoryList, null, ['class' => 'form-control']) !!}
                @if($errors->has('category_id'))
                    <span class="help-block">
                        <strong> {{ $errors->first('category_id') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                {!! Form::label('description', 'Description :') !!}
                {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                @if($errors->has('description'))
                    <span class="help-block">
                        <strong> {{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                {!! Form::label('price', 'Prix :') !!}
                {!! Form::number('price', null, ['class' => 'form-control']) !!}
                @if($errors->has('price'))
                    <span class="help-block">
                        <strong> {{ $errors->first('price') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
                {!! Form::label('quantity', 'Quantité :') !!}
                {!! Form::number('quantity', null, ['class' => 'form-control']) !!}
                @if($errors->has('quantity'))
                    <span class="help-block">
                        <strong> {{ $errors->first('quantity') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('image', 'Image :') !!}
                {!! Form::file('image') !!}
            </div>

            {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary pull-right']) !!}
            {!! Form::close() !!}
        </div>
    </div>

@endsection