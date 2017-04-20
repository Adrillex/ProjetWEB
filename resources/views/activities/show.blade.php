@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3" style="text-align: center">
                <div style="height: 200px; width: 200px; background-color: #c1e2b3; display: inline-block">
                    <?php $path = 'img/activities/' . $activity->id . '.PNG'; ?>
                    @if(File::exists($path))
                        {{ Form::image($path), ['class' => 'pull-right'] }}
                    @endif
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
                            <div class="row">
                                <div class="col-md-6" style="text-align: center">
                            <h4>{{ $date->date }}</h4>
                                </div>
                            @if(Auth::user()->status == 2 && Auth::user()->id == $activity->user_id)
                                <div class="col-md-6" style="text-align: center">
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['activities.destroy', $activity->id]]) !!}
                                    {!! Form::submit('Supprimer', ['class' => 'btn btn-danger'] ) !!}
                                    {!! Form::close() !!}
                                </div>
                            @endif
                            </div>
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
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    @foreach($imageList as $image)
                        <?php $path = 'img/activities/' .$image['id'] . '.PNG'; ?>
                        @if(File::exists($path))
                            {{ Form::image($path) }}
                            <p> Ajouté par :
                                {{ $userPicture[$image->id]->first()->name}}
                            </p>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    <h2>Ajouter une image</h2>
                    {!! Form::open(['route' => 'pictures.store', 'files' => true])  !!}
                    {!! Form::hidden('activity_id', $activity->id) !!}
                    {!! Form::file('image') !!}
                    {!! Form::submit('Valider', ['class' => 'btn btn-primary pull-right']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="container">
            <div class="container">
                <h2 class="col-md-6 col-md-offset-3">Espace commentaire</h2>
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
            <div class="col-md-6 col-md-offset-3">
                @foreach($commentaries as $commentary)
                    @if(!$loop->first)
                        <hr>
                    @endif
                    @if(Auth::user()->status == 2 || Auth::user()->id == $userList[$commentary->user_id]->id)
                        {{Form::open(['method' => 'DELETE','route' => ['commentaries.destroy', $commentary->id]])}}
                            {{Form::submit('Supprimer', ['class' => 'btn btn-danger btn-sm pull-right'])}}
                        {{Form::close()}}
                    @endif
                    <p>{{ 'Posté par ' }}{{ $userList[$commentary->user_id]->name}} {{$userList[$commentary->user_id]->surname }}</p>
                    <p>{{ $commentary->content }}</p>
                    <p>{{ $commentary->creation_date->diffForHumans()}}</p>
                @endforeach
            </div>
        </div>
    </div>
@endsection