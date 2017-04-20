@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <ul class="col-md-12" style="list-style:none;"><h3>Vos idées proposées</h3>
                    @foreach($suggestionList as $suggestion)
                        @if(!$loop->first)
                            <hr>
                        @endif
                        <li class="col-md-offset-1">
                            <a href="{{ route('suggestionBox.show', $suggestion)}}"><h3>{{ $suggestion->title }}</h3></a>
                            <p>{{ $suggestion->content }}</p>
                        </li>

                    @endforeach
                </ul>
            </div>
            <div class="col-md-6">
                <h3>Dernières Nouvelles</h3>
                <div class="panel panel-default">
                    <div id="carouselText" class="carousel slide" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <?php $increment = 0?>
                            @foreach($news as $id =>$new)
                                @if ($increment==0)
                                    <div class="item active">
                                        <div class="carousel-content">
                                            <h3 style="text-align: center;"><a href={{route('news.show', $new)}} >{{$new->title}}</a></h3>
                                            <p style="color: black; text-align: center;">{{$new->content}}</p>
                                        </div>
                                    </div>
                                @else
                                    <div class="item">
                                        <div class="carousel-content">
                                            <h3 style="text-align: center;"><a href={{route('news.show', $new)}}>{{$new->title}}</a></h3>
                                            <p style="color: black; text-align: center;">{{$new->content}}</p>
                                        </div>
                                    </div>
                                @endif
                                <?php $increment += 1?>
                            @endforeach
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carouselText" role="button" data-slide="prev" style="background: none;">
                            <!--<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>-->
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carouselText" role="button" data-slide="next" style="background: none;">
                            <!--<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>-->
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <ul class="col-md-12" style="list-style:none;"><h3>Prochaines Activités</h3>
                    @foreach($activities as $activity)
                        <a href="{{ route('activities.show', $activity) }}"><h3 style="margin-top: 0%">{{ $activity->title }}</h3></a>
                        <p>{{ $activity->content }}</p>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#carouselText').carousel()
    </script>

@endsection