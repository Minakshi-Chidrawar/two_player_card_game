@extends('layouts.app')

@section('content')
    <ul class="nobullet">
        <li>This is a two player simulation card game</li>
        <li>The game starts with a deck of cards</li>
        <li>The cards are dealt out to both players</li>
    </ul>

    <div class="my-5 pb-4">
        <a href="{{ route('startgame') }}" class="btn btn-warning">Start Game</a>
    </div>

    <div class="justify-text-center" style="margin-left: 28%">
        <ol class="text-left">
            <h5>On each turn:</h5>
            <li>Both players turn over their top-most card</li>
            <li>The player with the higher valued card takes the cards and <br>puts them in their scoring pile (scoring 1 point per card)</li>
            <li>This continues until the players have no cards left</li>
            <li>The player with the highest score wins</li>
        </ol>
    </div>
@endsection