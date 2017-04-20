@extends('layouts.app')

@section('content')
    <div class="content">
        <h2 class="col-md-6 col-md-offset-3">Voici toutes les personnes inscrites</h2>
        @foreach($users as $id=>$user)
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    <p>
                        {!! Form::label('name', $user->name, ['style' =>'color : #B40202;']) !!}
                        {!! Form::label('name', $user->surname, ['style' =>'color : #B40202;']) !!}
                    </p>
                </div>
                @if($user->status == 1)
                    <p>
                        {!! Form::open(['method' => 'put', 'route' => ['profile.update', $user]]) !!}
                        {!! Form::hidden('status', 2) !!}
                        {!! Form::submit('Etudiant lambda, changer en membre du BDE? Cliquez, c\'est adopter', ['class' => 'btn btn-link']) !!}
                        {!! Form::close() !!}</p>
                @elseif($user->status == 2)
                    <p>{!! Form::label('status', 'Membre du BDE, pas de modification possible') !!}</p>
                @elseif($user->status == 3)
                    <p>{!! Form::label('status', 'Membre du CESi, pas de modification possible') !!}</p>
                @endif
            </div>
        @endforeach
    </div>
@endsection