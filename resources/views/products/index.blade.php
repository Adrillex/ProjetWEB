@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="col-md-6 col-md-offset-3">
            <?php $category = -1;?>
            @foreach($productList as $product)

                @if($product->id_categories != $category)
                    <p> {{ $product->id_categories }}</p>
                @endif

                <?php $category = $product->id_categories; ?>
                @if(!$loop->first)
                    <hr>
                @endif

                <a href="{{ route('products.show', $product) }}" class="text-info"><u><h3>{{ $product->name }}</h3></u></a>
                <div class="form-group">
                    {{ Form::label('description', $product->description, ['class' => 'text-center form-control pull-left']) }}

                    @foreach($imageList[$product->id] as $image)
                        @if(isset($image))
                                {{ Form::image('img/products/' . $image->id . '.PNG'), ['class' => 'pull-right'] }}
                        @endif
                    @endforeach
                </div>
                <p>Prix : {{ $product->price }}€</p>

                    @if($product->quantity === 0)
                        <p class="alert-danger">Rupture de stock.</p>
                    @else
                    {!! Form::open(['route' => 'buy.store']) !!}
                    {!! Form::hidden('product_id', $product->id) !!}
                    <p>Quantité : {!! Form::number('quantity', '1', ['min' => '1', 'max' => $product->quantity]) !!}</p>
                    {!! Form::submit('Acheter', ['class' => 'btn btn-danger pull-right'] ) !!}
                    {!! Form::close() !!}
                    @endif

                @if(Auth::check() && Auth::user()->status===2)
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-primary pull-left">Editer le produit</a>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['products.destroy', $product->id]]) !!}
                    {!! Form::submit('Supprimer', ['class' => 'btn btn-danger pull-left'] ) !!}
                    {!! Form::close() !!}
                @endif

            @endforeach

        </div>
    </div>
@endsection