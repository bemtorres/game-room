<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class ShareController extends Controller
{
  public function show($url) {
    if(Auth::guard('usuario')->check()){
      Auth::guard('usuario')->logout();
    }

    $r = Room::where('url', $url)->firstOrFail();

    if ($r->type == 2 && $r->getConfigEnableRegister()) {
      return view('share.bank.show', compact('r'));
    } else {
      return redirect('/');
    }
  }

  public function login(Request $request, $url) {
    try {
      $r = Room::where('url', $url)->firstOrFail();
      $u = User::where('email',$request->input('email'))->firstOrFail();
      $pass = hash('sha256', $request->input('password'));

      if($u->password==$pass){

        Auth::guard('usuario')->loginUsingId($u->id);
        return redirect()->route('game.bank.show', $r->id);

      }else{
        return back()->with('info','Error. Intente nuevamente.');
      }
    } catch (\Throwable $th) {
      return back()->with('info','Error. Intente nuevamente.');
    }
  }

  public function account($url) {
    if(Auth::guard('usuario')->check()){
      Auth::guard('usuario')->logout();
    }

    $r = Room::where('url', $url)->firstOrFail();

    if ($r->type == 2) {
      return view('share.bank.account', compact('r'));
    }
  }

  public function register(Request $request, $url) {
    $r = Room::where('url', $url)->firstOrFail();

    $email = $request->input('email');
    $user = User::where('email', $email)->first();

    if (!$user) {
      $user = new User();
      $user->name = $request->input('name');
      $user->email = $email;
      $user->password = hash('sha256',$request->input('password'));
      $user->credit = $request->input('credit',0);
      $user->admin = false;
      $user->phone = '';
      $user->save();


      Auth::guard('usuario')->loginUsingId($user->id);

      return redirect()->route('game.bank.show', $r->id);
    }

    return back()->with('danger', 'No se pudo crear');
  }
}
