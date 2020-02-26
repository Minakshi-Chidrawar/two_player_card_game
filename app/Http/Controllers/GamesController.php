<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GamesController extends Controller
{
    public function __invoke()
    {
        return view('welcome');
    }

    public function startGame(Request $request)
    {
        $request->session()->flush();

        $deck  = $this->getDeck();
        $players = $this->deal_cards($deck);
        $this->setSessionValues($players);

        return view('games.startGame', compact('players'));
    }

    public function nextTurn()
    {
        $player1 = session('player1');
        $player2 = session('player2');

        if (count($player1) === 0) {
            $winner = $this->getWinner();
            return view('games.winner', compact('winner'));
        }

        $player1_card = $player1[0];
        $player2_card = $player2[0];

        $this->addPointsToScore($this->getValueOfCard($player1_card[0]), $this->getValueOfCard($player2_card[0]));

        session(['player1' => array_slice($player1, 1)]);
        session(['player2' => array_slice($player2, 1)]);

        return view('games.showCards', compact('player1_card', 'player2_card'));
    }

    public function getDeck()
    {
        $suits = ['♠', '♥', '♦', '♣'];
        $values = ["A", "2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K"];

        $deck = [];

        for($i = 0; $i < count($suits); $i++)
        {
            for($x = 0; $x < count($values); $x++)
            {
                $card = [$values[$x],  $suits[$i]];
                array_push($deck, $card);
            }
        }

        return $deck;
    }

    public function deal_cards($deck)
    {
        shuffle($deck);

        $players = [[],[]];
        for($i = 0; $i < count($deck); $i++){
            $players[$i % 2][] = $deck[$i];   
        }

        return $players;
    }

    public function setSessionValues($players)
    {
        session(['player1' => $players[0]]);
        session(['player2' => $players[1]]);
        session(['player1_score' => 0]);
        session(['player2_score' => 0]);
    }

    public function addPointsToScore($player1_cardValue, $player2_cardValue)
    {
        $player1_score = session('player1_score');
        $player2_score = session('player2_score');

        if ($player1_cardValue !== $player2_cardValue) {
            $player1_cardValue > $player2_cardValue ? 
                session(['player1_score' => $player1_score + 1])
                : session(['player2_score' => $player2_score + 1]);
        }

    }

    public function getValueOfCard($card)
    {
        switch ($card) {
            case 'A':
                $value = 14;
                break;
            case 'J':
                $value = 11;
                break;
            case 'Q':
                $value = 12;
                break;
            case 'K':
                $value = 13;
                break;
            default:
                $value = $card;
        }

        return $value;
    }

    public function getWinner()
    {        
        $player1_score = session('player1_score');
        $player2_score = session('player2_score');
        $text = "Winner is ";

        if ($player1_score === $player2_score) {
            return 'It is a TIE!';
        } else {
            return $player1_score > $player2_score ? "$text Player 1" : "$text Player 2";
        }

        return "Something went wrong :(";
    }
}