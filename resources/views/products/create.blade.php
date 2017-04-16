@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="col-md-6 col-md-offset-3">
            {!! Form::open(['route' => 'products.store'])  !!}
            <div class="form-group">
                {!! Form::label('name', 'Nom du produit :') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
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
                {!! Form::label('quantity', 'Quantiter :') !!}
                {!! Form::number('quantity', null, ['class' => 'form-control']) !!}
            </div>

            {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary pull-right']) !!}
            {!! Form::close() !!}
        </div>
    </div>

@endsection