@extends('layouts.app')

@section('content')
    <div class="content col-md-6 col-md-offset-3">
        <div>
            <a href="{{route('products.index')}}" class="btn btn-primary">Retourner au magasin</a>
        </div>
        <?php $totalPrice = 0; ?>
        @foreach($user->product as $buy)
            <?php $totalPrice += $buy->price * $buy->pivot->quantity; ?>
        @endforeach
        <div class="form-group">
            <p>Nombre de produits : {{ count($user->product) }}.</p>
            <p>Prix total : {{ $totalPrice }}€</p>
        </div>

        @foreach($user->product as $buy)
            <div class="form-group">
                <a href="{{ route('products.show', $buy) }}" class="text-info"><u><h3>{{ $buy->name }}</h3></u></a>
                {!! Form::label('description', $buy->description) !!}

                {!! Form::open(['method' => 'PUT','route' => ['buy.update', $buy->id]]) !!}
                <p>Prix unitaire : {{ $buy->price }}€</p>
                @if($buy->pivot->quantity > 1)
                    <p>Prix : {{ $buy->price * $buy->pivot->quantity }}€</p>
                @endif
                {!! Form::submit('Modifier', ['class' => 'btn btn-success']) !!}
                {!! Form::number('quantity', $buy->pivot->quantity, ['min' => '1', 'max' => $user->quantity]) !!}
                {!! Form::close() !!}

                <p>{!! Form::open(['method' => 'DELETE','route' => ['buy.destroy', $buy->id]]) !!}
                    {!! Form::submit('Supprimer du panier', ['class' => 'btn btn-danger pull-right']) !!}
                    {!! Form::close() !!}</p>
                <hr>
            </div>

        @endforeach
    </div>
@endsection