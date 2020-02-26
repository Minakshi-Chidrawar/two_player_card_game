@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center  align-items-center">
        <div class="winner mb-5 pb-5">
            <h1 class="m-5 p-5"><em><i>{{ $winner }}</i></em>!</h1>
        </div>
    </div>
    <a href="{{ route('startgame') }}" class="btn btn-warning">New Game</a>
@endsection