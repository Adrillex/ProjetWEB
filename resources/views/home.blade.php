@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <ul class="col-md-12" style="list-style:none;"><h3>Vos idées proposées</h3>
                <li class="col-md-offset-1">
                    Idée n°1
                </li>
                <li class="col-md-offset-1">
                    Idée n°2
                </li>
                <li class="col-md-offset-1">
                    Idée n°3
                </li>
                <li class="col-md-offset-1">
                    Idée n°4
                </li>
                <li class="col-md-offset-1">
                    Idée n°5
                </li>
            </ul>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Banderole News</div>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <?php $increment = 0?>
                        @foreach($news->reverse() as $id =>$new)
                            @if ($increment===0)
                            <div class="item active">
                                <div class="carousel-content">
                                    <h3><a href={{route('news.show', $new)}}>{{$new->title}}</a></h3>
                                    <p style="color: black;">{{$new->content}}</p>
                                </div>
                            </div>
                            @else
                            <div class="item">
                                <div class="carousel-content">
                                    <h3><a href={{route('news.show', $new)}}>{{$new->title}}</a></h3>
                                    <p style="color: black;">{{$new->content}}</p>
                                </div>
                            </div>
                            @endif
                            <?php $increment += 1?>
                        @endforeach
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carouselText" role="button" data-slide="prev" style="background: none;">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carouselText" role="button" data-slide="next" style="background: none;">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <h3>Activité de la semaine</h3>
            <p>Pour l'instant, je vais mettre du texte et placer ce texte dans ce menu home</p>
        </div>
    </div>
</div>
@endsection
