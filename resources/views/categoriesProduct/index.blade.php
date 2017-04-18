@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="col-md-6 col-md-offset-3">
            <a href=" {{ route('categoriesProduct.create') }}" class="btn btn-primary">Créer une nouvelle catégorie</a>
            @foreach($categoryList as $category)
                @if(!$loop->first)
                    <hr>
                @endif
                <p>{{ $category->name }}</p>
                {!! Form::open(['method' => 'DELETE', 'route' => ['categoriesProduct.destroy', $category]]) !!}
                {!! Form::submit('Supprimer', ['class' => 'btn btn-danger pull-right'] ) !!}
                {!! Form::close() !!}
                <a href="{{ route('categoriesProduct.edit', $category) }}" class="btn btn-primary pull-right">Renomer</a>
            @endforeach

        </div>
    </div>
@endsection