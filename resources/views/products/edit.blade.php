@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            {!! Form::model($product, ['route' => ['products.update', $product], 'method' => 'PUT']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nom du produit :') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::select('category_id', $categoryList, null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('description', 'Description :') !!}
                {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('price', 'Prix :') !!}
                {!! Form::number('price', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('quantity', 'Quantité :') !!}
                {!! Form::number('quantity', null, ['class' => 'form-control']) !!}
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