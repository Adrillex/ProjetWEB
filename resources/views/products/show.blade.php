@extends('layouts.app')
@section('content')
    <div class="container">
        <h3>{{ $product->name }}</h3>
        <p>{{ $product->description }}</p>
        <p>{{ $product->price }}</p>
        <p>{{ $product->quantity }}</p>
        <p>Created {{ $product->created_at->diffForHumans() }}</p>

        <a href="{{ route('products.index') }}" class="btn btn-primary button-green pull-right">Retourner au magasin</a>
        @if(Auth::check() && Auth::user()->status===1)
            <a href="{{ route('products.edit', $product) }}" class="btn btn-primary pull-right">Editer le produuit</a>
            {!! Form::open(['method' => 'DELETE', 'route' => ['products.destroy', $product]]) !!}
            {!! Form::submit('Supprimer', ['class' => 'btn btn-danger pull-right'] ) !!}
            {!! Form::close() !!}
        @endif
    </div>
@endsection