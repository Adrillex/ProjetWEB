@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="col-md-6 col-md-offset-3">
            <a href="{{route('news.create')}}" class="btn btn-primary">Créer une New</a>
        </div>
    </div>
@endsection