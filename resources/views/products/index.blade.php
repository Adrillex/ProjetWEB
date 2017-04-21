@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="col-md-12">
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
                    <div class="container" style="">
                        <a href="{{ route('products.show', $product) }}" class="text-info"><u><h3>{{ $product->name }}</h3></u></a>

                        <div style="margin-top: 2%;">
                            <div class="col-md-4 col-md-offset-1" style="text-align: center; margin-top: 2%;">
                                {{ Form::label('description', $product->description , ['class'  => ''])}}
                            </div>
                            <div class="col-md-4 col-md-offset-2">

                                @foreach($imageList[$product->id] as $image)
                                    @if(isset($image))
                                        {{ Form::image('img/products/' . $image->id . '.PNG') }}
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="container" style="margin-top: 30px;">
                            <div class="col-md-4 col-md-offset-2">
                            <p>Prix : {{ $product->price }}€</p>

                            @if(isset($buyList[$product->id]))
                                {{ $isExist = true }}
                            @else
                                {{ $isExist = false }}
                            @endif

                                @if($product->quantity <= 0)
                                    <p class="alert-danger">Rupture de stock.</p>
                                @else
                                    <?php $method = 'POST'; ?>
                                    <?php $route = 'buy.store'; ?>
                                    @if(Auth::check())
                                        @if($isExist)
                                                <?php $method = 'GET'; ?>
                                        @endif
                                    @else
                                            <?php $route = 'login'; ?>
                                    @endif
                                    <div class="form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
                                        {!! Form::open(['method' => $method, 'route' => $route]) !!}
                                            {!! Form::hidden('product_id', $product->id) !!}
                                            <p>Quantité : {!! Form::number('quantity', '1', ['min' => '1', 'max' => $product->quantity]) !!}</p>
                                            @if($errors->has('quantity'))
                                                <span class="help-block">
                                                            <strong> {{ $errors->first('quantity') }}</strong>
                                                        </span>
                                            @endif
                                            {!! Form::submit('Acheter', ['class' => 'btn btn-danger'] ) !!}
                                        {!! Form::close() !!}
                                        <p>Produits en stock : {{ $product->quantity }}</p>

                                    @if(Auth::check() && Auth::user()->status == 3)
                                        <a href="{{ route('products.edit', $product) }}" class="btn btn-primary pull-left">Editer le produit</a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['products.destroy', $product->id]]) !!}
                                            {!! Form::submit('Supprimer', ['class' => 'btn btn-danger'] ) !!}
                                        {!! Form::close() !!}
                                    @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection