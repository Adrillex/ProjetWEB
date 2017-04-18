@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        Vous n'êtes pas autorisé à faire ceci
                        <a href="{{('/home')}}" class="btn btn-primary">Retour au menu</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection