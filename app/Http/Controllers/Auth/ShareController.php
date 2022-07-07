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
    $r = Room::where('url', $url)->firstOrFail();

    if ($r->type == 2 && $r->getConfigEnableRegister()) {
      return view('share.bank.show', compact('r'));
    } else {
      return redirect('/');
    }
  }

  public function login(Request $request, $url) {

  }

  public function account($url) {
    $r = Room::where('url', $url)->firstOrFail();

    if ($r->type == 2) {
      return view('share.bank.account', compact('r'));
    }
  }

  public function register(Request $request, $url) {

  }
}
