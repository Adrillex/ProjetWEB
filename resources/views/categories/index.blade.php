@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="col-md-6 col-md-offset-3">
            <a href=" {{ route('categories.create') }}" class="btn btn-primary">Créer une nouvelle catégorie</a>
            @foreach($categoryList as $category)
                @if(!$loop->first)
                    <hr>
                @endif
                <p>{{ $category->name }}</p>
                {!! Form::open(['method' => 'DELETE', 'route' => ['categories.destroy', $category]]) !!}
                {!! Form::submit('Supprimer', ['class' => 'btn btn-danger pull-right'] ) !!}
                {!! Form::close() !!}
                <a href="{{ route('categories.edit', $category) }}" class="btn btn-primary pull-right">Renomer</a>
            @endforeach

        </div>
    </div>
@endsection