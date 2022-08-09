<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\Bank\GameController as BankGameController;
use App\Http\Controllers\Admin\GameController;
use App\Http\Controllers\Admin\UsuarioController;

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
  Route::prefix('game')->group( function () {
    Route::get('/{room_id}', [GameController::class, 'show'])->name('game.show');
    Route::post('/{room_id}', [GameController::class, 'enrollment'])->name('game.enrollment');
    Route::get('/{room_id}/loto/{id}', [GameController::class, 'loto'])->name('game.loto');
    Route::post('/{room_id}/loto/{id}', [GameController::class, 'claim'])->name('game.claim');
  });

  // Banco
  Route::prefix('game_banco')->name('game.bank.')->group( function () {
    Route::get('/{room_id}', [BankGameController::class, 'show'])->name('show');
    Route::post('/{room_id}', [BankGameController::class, 'enrollment'])->name('enrollment');
    Route::get('/{room_id}/play', [BankGameController::class, 'play'])->name('game.bank.play');
    Route::get('/{room_id}/play_banker', [BankGameController::class, 'playBanker'])->name('play_banker');
    Route::post('/{room_id}/transfer', [BankGameController::class, 'transfer'])->name('transfer');
    Route::post('/{room_id}/charge', [BankGameController::class, 'charge'])->name('charge');
    Route::delete('/{room_id}/charge_cancel', [BankGameController::class, 'charge_cancel'])->name('charge_cancel');
    Route::post('/{room_id}/payment', [BankGameController::class, 'payment'])->name('payment');

    Route::put('/{room_id}/profile', [BankGameController::class, 'profile'])->name('profile');
    Route::put('/{room_id}/avatar', [BankGameController::class, 'avatar'])->name('avatar');
  });


  // Cupones
  Route::resource('cupons', 'Admin\CuponController');
  Route::put('cupon/active', 'Admin\CuponController@active')->name('cupon.active');
  Route::get('cupon/{id}/people', 'Admin\CuponController@people')->name('cupon.people');

  Route::resource('usuarios', 'Admin\UsuarioController');
  Route::get('usuario/admin', [UsuarioController::class, 'admin'])->name('user.admin');
  Route::get('usuario/masiva',  [UsuarioController::class, 'masiva'])->name('user.masiva');
  Route::post('usuario/masiva', [UsuarioController::class, 'import'])->name('user.import');
  Route::get('usuarios/{id}/game', [UsuarioController::class, 'game'])->name('user.game');
  Route::put('usuarios/{id}/password', [UsuarioController::class, 'password'])->name('user.password');
  Route::get('usuarios/{id}/credit', [UsuarioController::class, 'creditos'])->name('user.credit');
  Route::put('usuarios/{id}/credit', [UsuarioController::class, 'credit'])->name('user.credit');


  Route::resource('rooms', 'Admin\RoomController');
  Route::put('rooms/{id}/update_v2', 'Admin\RoomController@updateV2')->name('rooms.update_v2');

  // Loteria
  Route::get('room/{id}/players','Admin\RoomController@players')->name('room.players');
  Route::get('room/{id}/solicitudes','Admin\RoomController@solicitudes')->name('room.solicitudes');
  Route::put('room/{id}/solicitudes','Admin\RoomController@solicitudesValidar')->name('room.solicitudes.validar');
  Route::post('room/{id}/save_numbers','Admin\RoomController@saveNumber')->name('room.number');

  // Banco
  Route::get('rooms_bank/{id}', 'Admin\Bank\RoomBankController@show')->name('rooms.bank.show');
  Route::get('rooms_bank/{id}/players', 'Admin\Bank\RoomBankController@players')->name('rooms.bank.players');
  Route::put('rooms_bank/{id}/players', 'Admin\Bank\RoomBankController@playersBanker')->name('rooms.bank.players');
  Route::get('rooms_bank/{id}/transactions', 'Admin\Bank\RoomBankController@transactions')->name('rooms.bank.transactions');


  Route::get('loto','Admin\LotoController@index')->name('loto.index');
  Route::post('loto','Admin\LotoController@find')->name('loto.find');
  Route::get('loto/{id}','Admin\LotoController@show')->name('loto.show');




  // API
  Route::put('collapse','Admin\UsuarioController@collapse');
});

// PUBLIC

Route::get('app/room/{url}','Auth\ShareController@show')->name('app.room.share');
Route::post('app/room/{url}','Auth\ShareController@login')->name('app.room.share');

Route::get('app/room/{url}/account','Auth\ShareController@account')->name('app.room.account');
Route::post('app/room/{url}/account','Auth\ShareController@register')->name('app.room.account');

// Route::post('app/room/public','Auth\AuthController@login')->name('root');
