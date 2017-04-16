@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="col-md-6 col-md-offset-3">
            <a href=" {{ route('products.create') }}" class="btn btn-primary">Créer un article</a>
            @foreach($productList as $product)
                @if(!$loop->first)
                    <hr>
                @endif
                    <a href="{{ route('products.show', $product) }}"><h3>{{ $product->name }}</h3></a>
                    <p>{{ $product->description }}</p>
                    <p>{{ $product->price }}</p>
                    <p>{{ $product->quantity }}</p>
                    <p>Created {{ $product->created_at->diffForHumans() }}</p>
            @endforeach

        </div>
    </div>
@endsection