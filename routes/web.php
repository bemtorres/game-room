<?php

use Illuminate\Support\Facades\Route;

Route::get('/','Auth\AuthController@index')->name('root');
Route::post('/','Auth\AuthController@login')->name('root');

Route::middleware('usuario')->group( function () {
  Route::get('home','Admin\AdminController@home')->name('home');
  Route::get('home/finalizados','Admin\AdminController@finalizados')->name('home.finalizado');
  Route::get('cuenta','Admin\AdminController@cuenta')->name('cuenta');
  Route::get('trofeos','Admin\AdminController@trofeos')->name('trofeos');
  Route::post('canjear','Admin\AdminController@canjear')->name('canjear');

  // GAME

  // Loteria
  Route::get('game/{room_id}','Admin\GameController@show')->name('game.show');
  Route::post('game/{room_id}','Admin\GameController@enrollment')->name('game.enrollment');
  Route::get('game/{room_id}/loto/{id}','Admin\GameController@loto')->name('game.loto');
  Route::post('game/{room_id}/loto/{id}','Admin\GameController@claim')->name('game.claim');

  // Banco
  Route::get('game_banco/{room_id}','Admin\Bank\GameController@show')->name('game.bank.show');
  Route::post('game_banco/{room_id}','Admin\Bank\GameController@enrollment')->name('game.bank.enrollment');
  Route::get('game_banco/{room_id}/play','Admin\Bank\GameController@play')->name('game.bank.play');
  Route::get('game_banco/{room_id}/play_banker','Admin\Bank\GameController@playBanker')->name('game.bank.play_banker');
  Route::post('game_banco/{room_id}/transfer','Admin\Bank\GameController@transfer')->name('game.bank.transfer');
  Route::put('game_banco/{room_id}/profile','Admin\Bank\GameController@profile')->name('game.bank.profile');

  // Cupones
  Route::resource('cupons', 'Admin\CuponController');
  Route::put('cupon/active', 'Admin\CuponController@active')->name('cupon.active');
  Route::get('cupon/{id}/people', 'Admin\CuponController@people')->name('cupon.people');

  Route::resource('usuarios', 'Admin\UsuarioController');
  Route::get('usuario/admin', 'Admin\UsuarioController@admin')->name('user.admin');
  Route::get('usuario/masiva', 'Admin\UsuarioController@masiva')->name('user.masiva');
  Route::post('usuario/masiva', 'Admin\UsuarioController@import')->name('user.import');
  Route::get('usuarios/{id}/game', 'Admin\UsuarioController@game')->name('user.game');
  Route::put('usuarios/{id}/password', 'Admin\UsuarioController@password')->name('user.password');
  Route::get('usuarios/{id}/credit', 'Admin\UsuarioController@creditos')->name('user.credit');
  Route::put('usuarios/{id}/credit', 'Admin\UsuarioController@credit')->name('user.credit');


  Route::resource('rooms', 'Admin\RoomController');

  // Loteria
  Route::get('room/{id}/players','Admin\RoomController@players')->name('room.players');
  Route::get('room/{id}/solicitudes','Admin\RoomController@solicitudes')->name('room.solicitudes');
  Route::put('room/{id}/solicitudes','Admin\RoomController@solicitudesValidar')->name('room.solicitudes.validar');
  Route::post('room/{id}/save_numbers','Admin\RoomController@saveNumber')->name('room.number');

  // Banco
  Route::get('rooms_bank/{id}', 'Admin\Bank\RoomBankController@show')->name('rooms.bank.show');
  Route::get('rooms_bank/{id}/players', 'Admin\Bank\RoomBankController@players')->name('rooms.bank.players');


  Route::get('loto','Admin\LotoController@index')->name('loto.index');
  Route::post('loto','Admin\LotoController@find')->name('loto.find');
  Route::get('loto/{id}','Admin\LotoController@show')->name('loto.show');




  // API
  Route::put('collapse','Admin\UsuarioController@collapse');
});
