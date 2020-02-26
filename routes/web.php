<?php

Route::get('/', 'GamesController');
Route::get('/startGame', 'GamesController@startGame')->name('startgame');
Route::get('/nextTurn', 'GamesController@nextTurn')->name('nextturn');
