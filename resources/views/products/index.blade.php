@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="col-md-6 col-md-offset-3">
            @if(Auth::check() && Auth::user()->status === 1)
                <a href=" {{ route('products.create') }}" class="btn btn-primary">Créer un nouveau produit</a>
            @endif
            <?php $category = 2;?>
            @foreach($productList as $product)
                @if($product->id_categories != $category)
                    <p> {{ $product->id_categories }}</p>
                @endif
                <?php $category = $product->id_categories; ?>
                @if(!$loop->first)
                    <hr>
                @endif
                <a href="{{ route('products.show', $product) }}" class="text-info"><u><h3>{{ $product->name }}</h3></u></a>
                {{ Form::label('description', $product->description, ['class' => 'text-center form-control']) }}
                <p>Prix : {{ $product->price }}€</p>
                <p>Quantité : {{ $product->quantity }}.</p>
            @endforeach

        </div>
    </div>
@endsection