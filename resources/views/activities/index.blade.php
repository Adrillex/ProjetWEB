@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('categories.create') }}" class="btn btn-primary">Creer une nouvelle catégorie</a>
        @foreach($categoryList as $category)
            @if(!$loop->first)
                <hr>
            @endif
            <a href="{{ route('category.show', $category) }}"><h3>{{ $category->name }}</h3></a>
            <p>Posted {{ $news->created_at->diffForHumans() }}</p>
        @endforeach
    </div>
@endsection
