@extends('layouts.app')

@section('content')
    <div class="content col-md-6 col-md-offset-3">
        <div>
            <a href="{{route('products.index')}}" class="btn btn-primary">Retourner au magasin</a>
        </div>
        @foreach($user->product as $buy)
            <div class="form-group">
                {!! Form::label('name', $buy->name) !!}
                {!! Form::label('description', $buy->description) !!}
                {!! Form::open(['method' => 'PUT','route' => ['buy.update', $buy->id]]) !!}
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