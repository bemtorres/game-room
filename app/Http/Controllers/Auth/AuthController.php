<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
  public function index() {
    if(Auth::guard('usuario')->check()){
      Auth::guard('usuario')->logout();
    }
    return view('auth.login');
  }

  public function login(Request $request) {
    try {

      $u = User::where('email',$request->input('email'))->firstOrFail();
      $pass = hash('sha256', $request->input('password'));

      if($u->password==$pass){

        Auth::guard('usuario')->loginUsingId($u->id);
        return redirect()->route('home');

      }else{
        return back()->with('info','Error. Intente nuevamente.');
      }
    } catch (\Throwable $th) {
      return back()->with('info','Error. Intente nuevamente.');
    }
  }
}
