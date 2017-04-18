@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <h3 class="text-info"><u>{{ $product->name }}</u></h3>
            {{ Form::label('description', $product->description, ['class' => 'text-center form-control']) }}
            <p>Prix : {{ $product->price }} €</p>
            <p>Quantité : {!! Form::number('quantity', '0', ['min' => '0', 'max' => $product->quanity]) !!}</p>

            <a href="" class="btn btn-primary btn-danger pull-right">Acheter</a>
            <a href="{{ route('products.index') }}" class="btn btn-primary pull-right">Retourner au magasin</a>
            @if(Auth::check() && Auth::user()->status===1)
                <a href="{{ route('products.edit', $product) }}" class="btn btn-primary pull-right">Editer le produuit</a>
                {!! Form::open(['method' => 'DELETE', 'route' => ['products.destroy', $product]]) !!}
                {!! Form::submit('Supprimer', ['class' => 'btn btn-danger pull-right'] ) !!}
                {!! Form::close() !!}
            @endif
        </div>
    </div>
@endsection

@section('linkShop')
    <a href="{{url('buy')}}">Panier</a>
@endsection