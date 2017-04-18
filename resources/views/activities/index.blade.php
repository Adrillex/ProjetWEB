@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('activities.create') }}" class="btn btn-primary">Creer une nouvelle Activité</a>
        @foreach($activities as $activity)
            <div class="well" style="margin-top: 20px">
                <div class="row">
                    <div class="col-sm-4">
                        <a href="{{ route('activities.show', $activity) }}"><h3 style="margin-top: 0%">{{ $activity->title }}</h3></a>
                    </div>
                    <div class="col-sm-4">
                        <p>{{ $activity->content }}</p>
                    </div>
                    <div class="col-sm-4" style="text-align: center">
                        @if(sizeof($dates[$activity->id])===1)
                            <h4>date de l'évènement :</h4>
                            <h4>{{ $dates[$activity->id][0]->date }}</h4>
                            @if(isset($likedates[$activity->id]))
                                <button class="btn btn-default">je ne participe plus</button>
                            @else
                                <button class="btn btn-default">je participe !</button>
                            @endif
                        @else
                            <h4>dates proposées :</h4>
                            @if(isset($likedates[$activity->id]))
                                <?php $liked = $activity->id?>
                            @else
                                <?php $liked = -1 ?>
                            @endif
                            @for($i=0; $i< sizeof($dates[$activity->id]); $i++)
                                <h4>{{ $dates[$activity->id][$i]->date }}</h4>
                                @if($liked === true && )
                            @endfor
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
