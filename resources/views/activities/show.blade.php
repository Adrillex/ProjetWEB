@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6" style="text-align: center">
                <div style="height: 200px; width: 200px; background-color: #c1e2b3">

                </div>
            </div>
            <div class="col-md-6" style="text-align: center">
                <h3> {{ $activity->title }} </h3>
            </div>
        </div>
    </div>
@endsection