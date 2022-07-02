<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Coupon;
use App\Models\CouponUser;
use App\Models\Room;
use App\Models\UserRoom;
use Illuminate\Http\Request;

class AdminController extends Controller
{
  public function home() {
    $rooms = Room::where('active',true)->whereIn('status',[1,2])->get();
    $ids = $rooms->pluck('id');
    $rooms_exist = UserRoom::whereIn('room_id', $ids)->where('user_id',current_user()->id)->get();

    foreach ($rooms as $r) {
      $r->selected = false;
      foreach ($rooms_exist as $re) {
        if ($r->id == $re->room_id) {
          $r->selected = true;
          continue;
        }
      }
    }

    return view('me.home',compact('rooms'));
  }

  public function finalizados() {
    $rooms = Room::where('active',true)->where('status',3)->get();
    return view('me.home',compact('rooms'));
  }


  public function cuenta() {
    return view('me.cuenta');
  }

  public function juego() {
    return view('me.juego');
  }

  public function trofeos() {
    return view('me.trofeos');
  }

  public function canjear(Request $request) {

    try {
      $c = Coupon::where('code',$request->input('code'))->where('active',true)->firstOrFail();

      if (!empty($c->password)) {
        $pass = $request->input('password');
        if ($c->password != $pass) {
          return back()->with('warning','Error en la contraseña.');
        }
      }

      $cu = CouponUser::where('coupon_id',$c->id)->where('user_id',current_user()->id)->first();

      if (empty($cu)) {
        $cu = new CouponUser();
        $cu->coupon_id = $c->id;
        $cu->user_id = current_user()->id;
        $cu->save();

        $a = new Account();
        $a->coupon_id = $c->id;
        $a->user_id = current_user()->id;
        $a->description = 'CAJE DE CUPÓN COD: '. $c->code;
        $a->price = $c->price;
        $a->save();

        $u = current_user();
        $u->credit += $c->price;
        $u->update();

        $c->cont_users++;
        $c->update();

        return back()->with('success','se ha creado correctamente');
      }else{
        return back()->with('info','Código ya usado');
      }
      return back()->with('danger','Error código no válido');
    } catch (\Throwable $th) {
      // return $th;
      return back()->with('danger','Error código no válido');
    }
  }
}
