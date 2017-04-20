@extends('layouts.app')

@section('content')
    <div class="container">
        <div style="text-align: center">
            <ul class="nav nav-pills" style="display: inline-block; padding: 0;">
                <li class="active"><a data-toggle="pill" href="#coming">Evenements à venir</a></li>
                <li><a data-toggle="pill" href="{{ route() }}">Evenements passés</a></li>
            </ul>
        </div>
        <div class="tab-content">
            @foreach($activities as $activity)
                <div class="well" style="margin-top: 20px; padding: 5px">
                    <div class="row">
                        <div class="col-sm-4" style="text-align: center">
                            <a href="{{ route('activities.show', $activity) }}"><h3 style="margin-top: 0%">{{ $activity->title }}</h3></a>

                            <?php $path = 'img/activities/' . $activity->id . '.PNG'; ?>
                            @if(File::exists($path))
                                {{ Form::image($path), ['class' => 'pull-right'] }}
                            @endif

                    </div>
                    <div class="col-sm-4">
                        <p>{{ $activity->content }}</p>
                    </div>
                    <div class="col-sm-4" style="text-align: center">
                        @if(sizeof($dates[$activity->id])==1)
                            <h4>date de l'évènement :</h4>
                            <h4>{{ $dates[$activity->id][0]->date }}</h4>
                            @if(isset($likedates[$activity->id]))
                                {{ Form::open(['method' => 'DELETE', 'route' => ['likeDates.destroy', $likedates[$activity->id]]]) }}
                                    {{ Form::submit('je ne participe plus', ['class' => 'btn btn-default']) }}
                                {{ Form::close() }}
                            @else
                                {{ Form::open(['route' => ['likeDates.store']]) }}
                                    {{ Form::hidden('date_id', $dates[$activity->id][0]->id) }}
                                    {{ Form::submit('je participe !', ['class' => 'btn btn-default']) }}
                                {{ Form::close() }}
                            @endif
                        @else
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th style="text-align: center">dates proposées</th>
                                    <th style="text-align: center">vote</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($likedates[$activity->id]))
                                    {{ Form::open(['method' => 'DELETE', 'route' => ['likeDates.destroy', $likedates[$activity->id]]]) }}
                                    {{ Form::submit('je ne participe plus', ['class' => 'btn btn-danger']) }}
                                    {{ Form::close() }}
                                @else
                                    {{ Form::open(['route' => ['likeDates.store']]) }}
                                    {{ Form::hidden('date_id', $dates[$activity->id][0]->id) }}
                                    {{ Form::submit('je participe !', ['class' => 'btn btn-success']) }}
                                    {{ Form::close() }}
                                @endif
                            @else
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <td>{{ $dates[$activity->id][$i]->date }}</td>
                                        <td>
                                            @if($liked == $dates[$activity->id][$i]->id)
                                                <span class="glyphicon glyphicon-ok"></span>
                                            @else
                                                @if($liked != -1)
                                                    {{ Form::open(['method' => 'PUT', 'route' => ['likeDates.update', $likedates[$activity->id]]]) }}
                                                @else
                                                    @if($liked != -1)
                                                        {{ Form::open(['method' => 'PUT', 'route' => ['likeDates.update', $likedates[$activity->id]]]) }}
                                                    @else
                                                        {{ Form::open(['route' => 'likeDates.store']) }}
                                                    @endif
                                                    {{ Form::hidden('date_id' , $dates[$activity->id][$i]->id) }}
                                                    {{Form::button('<i class="glyphicon glyphicon-plus"></i>', array('type' => 'submit', 'class' => 'btn btn-success btn-xs'))}}
                                                    {{ Form::close() }}
                                                @endif
                                            </td>
                                        </tr>
                                    @endfor
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="pagination"> {{ $activities->links() }}</div>
        </div>
    </div>
@endsection