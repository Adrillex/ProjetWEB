@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="col-md-6 col-md-offset-3">
            <?php $category = 0;?>
            @foreach($productList as $product)

                @if($product->category_id != $category)
                    <h1>
                        {{ $categoryList[$product->id]->name }}
                    </h1>

                @endif
                <?php $category = $product->category_id; ?>

                @if(!$loop->first)
                    <hr>
                @endif

                <a href="{{ route('products.show', $product) }}" class="text-info"><u><h3>{{ $product->name }}</h3></u></a>
                <div class="form-group">
                    {{ Form::label('description', $product->description, ['class' => 'text-center pull-right']) }}

                    @foreach($imageList[$product->id] as $image)
                        @if(isset($image))
                                {{ Form::image('img/products/' . $image->id . '.PNG'), ['class' => 'pull-left'] }}
                        @endif
                    @endforeach
                </div>
                <p>Prix : {{ $product->price }}€</p>

                @if(isset($buyList[$product->id]))
                    {{ $isExist = true }}
                @else
                    {{ $isExist = false }}
                @endif

                    @if($product->quantity <= 0)
                        <p class="alert-danger">Rupture de stock.</p>
                    @elseif(!$isExist)
                        <div class="form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
                            {!! Form::open(['route' => 'buy.store']) !!}
                                {!! Form::hidden('product_id', $product->id) !!}
                                <p>Quantité : {!! Form::number('quantity', '1', ['min' => '1', 'max' => $product->quantity]) !!}</p>
                                @if($errors->has('quantity'))
                                    <span class="help-block">
                                        <strong> {{ $errors->first('quantity') }}</strong>
                                    </span>
                                @endif
                                {!! Form::submit('Acheter', ['class' => 'btn btn-danger pull-right'] ) !!}
                            {!! Form::close() !!}
                            <p>Produits en stock : {{ $product->quantity }}</p>
                        </div>
                    @else
                        {!! Form::open(['method' => 'GET', 'route' => 'buy.index']) !!}
                        {!! Form::hidden('product_id', $product->id) !!}
                        <p>Quantité : {!! Form::number('quantity', '1', ['min' => '1', 'max' => $product->quantity]) !!}</p>
                        {!! Form::submit('Acheter', ['class' => 'btn btn-danger pull-right'] ) !!}
                        {!! Form::close() !!}
                    @endif

                @if(Auth::check() && Auth::user()->status == 3)
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-primary pull-left">Editer le produit</a>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['products.destroy', $product->id]]) !!}
                    {!! Form::submit('Supprimer', ['class' => 'btn btn-danger pull-left'] ) !!}
                    {!! Form::close() !!}
                @endif

            @endforeach

        </div>
    </div>
@endsection