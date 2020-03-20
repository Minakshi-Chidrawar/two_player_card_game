@extends('layouts.app')

@section('content')
    <div class="row">
        <!-- Player 1 -->
        <div class="col-sm-6">
            <h1 class="headerFont">Player 1</h1>
            <h4>Score: {{ session()->get('player1_score')}}</h4>
            
            <img src="{{ asset('images/backDeck.png') }}" class="backDeckImg mt-2" alt="Deck card for player 1">
        </div>

        <!-- Player 2 -->
        <div class="col-sm-5">
            <h1 class="headerFont">Player 2</h1>
            <h4>Score: {{ session()->get('player2_score')}}</h4>
            <img src="{{ asset('images/backDeck.png') }}" class="backDeckImg mt-2" alt="Deck card for player 2">
        </div>
    </div>
    
    @include('games.footerButton')
@endsection