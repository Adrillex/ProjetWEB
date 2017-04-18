@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="col-md-6 col-md-offset-3">
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
                    {!! Form::open(['route' => 'buy.store']) !!}
                    {!! Form::hidden('product_id', $product->id) !!}
                    <p>Quantité : {!! Form::number('quantity', '1', ['min' => '1', 'max' => $product->quantity]) !!}</p>
                    {!! Form::submit('Acheter', ['class' => 'btn btn-danger pull-right'] ) !!}
                    {!! Form::close() !!}
            @endforeach

        </div>
    </div>
@endsection

@section('linkShop')
    <a href="{{url('buy')}}">Panier</a>
@endsection