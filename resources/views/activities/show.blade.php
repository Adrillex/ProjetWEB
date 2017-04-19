@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3" style="text-align: center">
                <div style="height: 200px; width: 200px; background-color: #c1e2b3; display: inline-block">

                </div>
            </div>
            <div class="col-md-9" style="text-align: center">
                <h3> {{ $activity->title }} </h3>
                <p> {{ $activity->content }} </p>
            </div>
        </div>
        @if(sizeof($dates) > 1)
            <h3>Date et votes</h3>
        @else
            <h3>Date et participants</h3>
        @endif
        <div class="row">
            @foreach($dates as $date)
                <div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>{{ $date->date }}</h4>
                        </div>
                        <div class="panel-body">
                            <ul class="list-group">
                                @for($i=0; $i < sizeof($likedates[$date->id]); $i++)
                                        <li class="list-group-item" style="text-align: center">{{ $likedates[$date->id][$i]->name . ' ' . $likedates[$date->id][$i]->surname }}</li>
                                @endfor
                            </ul>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
        <div class="container">
            <h2 class="col-md-6 col-md-offset-3">Espace commentaire</h2>
            <div class="content">
                <h3 class="col-md-6 col-md-offset-3">Ajouter un commentaire</h3>
                {!! Form::open(['route' => 'commentaries.store']) !!}
                <div class="col-md-6 col-md-offset-3">
                    <div class="form-group">
                        {!! Form::hidden('activity_id', $activity->id) !!}
                        {!! Form::textarea('content', null, ['class' => 'form-control', 'rows' => 7 ,'placeholder' => "N'oubliez pas de rester courtois en toute circonstance."]) !!}
                    </div>
                </div>
                <div class="col-md-1 col-md-offset-8">
                    <div class="form-group">
                        {!! Form::submit('Valider', ['class' => 'btn btn-primary pull-right']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>



        </div>
    </div>
@endsection