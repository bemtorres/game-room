<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\LotoCard;
use App\Models\Room;
use Illuminate\Http\Request;

class LotoController extends Controller
{
  public function index() {
    $l = null;
    $total = LotoCard::count();
    return view('loto.index',compact('l','total'));
  }

  public function find(Request $request) {
    $id = $request->input('id');
    return redirect()->route('loto.show',$id);
  }

  public function show($id) {
    try {
      $l = LotoCard::findOrFail($id);
      $total = LotoCard::count();
      return view('loto.index',compact('l','total'));
    } catch (\Throwable $th) {
      return redirect()->route('loto.index')->with('info','no se encontro');
    }
  }
}
