<?php

namespace App\Http\Controllers\Admin\Bank;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Claim;
use App\Models\LotoCard;
use App\Models\Room;
use App\Models\UserRoom;
use App\Services\Policies\PolicyModel;
use Illuminate\Http\Request;

class GameController extends Controller
{
  public function show($room_id) {
    try {
      $r = Room::where('active',true)->where('status','<>',4)->findOrFail($room_id);
      $user_room = UserRoom::where('room_id',$r->id)->where('user_id',current_user()->id)->first();


      return $user_room;
      // if (empty($user_room)) {
      //   $total = LotoCard::count();

      //   return view('game.show',compact('r','total'));
      // }
      // return redirect()->route('game.loto',[$r->id,$user_room->id]);
    } catch (\Throwable $th) {
      return redirect()->route('home')->with('info', 'Juego no disponible');
    }
  }

  // public function enrollment(Request $request, $room_id) {
  //   try {
  //     $r = Room::where('active',true)->where('status',1)->findOrFail($room_id);
  //     $user_room = UserRoom::where('room_id',$r->id)->where('user_id',current_user()->id)->first();
  //     if (empty($user_room)) {
  //       $number_loto = $request->input('number');
  //       $user_room_exist = UserRoom::where('room_id',$r->id)->where('loto_id',$number_loto)->first();

  //       if (empty($user_room_exist)) {

  //         if (current_user()->credit < $r->price) {
  //           return back()->with('info','Ingresos insuficientes');
  //         }

  //         $user_room = new UserRoom();
  //         $user_room->room_id = $r->id;
  //         $user_room->loto_id = $number_loto;
  //         $user_room->user_id = current_user()->id;
  //         $user_room->save();

  //         $r->cont_users++;
  //         $r->update();

  //         $u = current_user();
  //         $u->credit -= $r->price;
  //         $u->update();

  //         $a = new Account();
  //         $a->user_id = current_user()->id;
  //         $a->loto_id = $number_loto;
  //         $a->room_id = $r->id;
  //         $a->description = 'COMPRA CARTON '. $number_loto . ' SALA ' . $r->id;
  //         $a->price = $r->price * -1;
  //         $a->save();

  //         return redirect()->route('game.loto',[$r->id,$user_room->id]);
  //       }
  //     }
  //     return redirect()->route('home')->with('info', 'Juego no disponible');
  //   } catch (\Throwable $th) {
  //     return redirect()->route('home')->with('info', 'Juego no disponible');
  //   }
  // }

  // public function loto($room_id, $room_user_id) {
  //   $user_room = UserRoom::where('room_id',$room_id)
  //                               ->where('user_id',current_user()->id)
  //                               ->with(['room','loto'])
  //                               ->findOrFail($room_user_id);
  //   $claim = Claim::where('claim_user_id',current_user()->id)
  //                 ->where('room_user_id',$user_room->id)
  //                 ->first();

  //   $numbers_selected = [];
  //   $claimers = null;
  //   if ($user_room->room->status == 3) {
  //     $numbers_selected = $user_room->room->config['numbers'];

  //     $claimers = Claim::where('room_id',$room_id)->where('status',2)->whereNotNull('position')->orderBy('position')->get();
  //   }

  //   return view('game.loto',compact('user_room','claim','numbers_selected','claimers'));
  // }

  // public function claim(Request $request, $room_id, $room_user_id) {
  //   try {
  //     $ticket = $request->input('ticket');
  //     $user_room = UserRoom::where('room_id',$room_id)
  //                         ->where('user_id',current_user()->id)
  //                         ->findOrFail($ticket);

  //     $r = Room::where('active',true)->whereIn('status',[1,2])->findOrFail($room_id);

  //     $claim = Claim::where('claim_user_id',current_user()->id)
  //                   ->where('room_user_id',$user_room->id)
  //                   ->first();
  //     // return $claim;
  //     if (empty($claim)) {
  //       $claim = new Claim();
  //       $claim->claim_user_id = current_user()->id;
  //       $claim->loto_id = $user_room->loto_id;
  //       $claim->room_user_id = $user_room->id;
  //       $claim->room_id = $room_id;
  //       $claim->save();
  //       return redirect()->route('game.loto',[$r->id,$user_room->id])->with('success','se ha enviado su solicitud');
  //     }
  //     return redirect()->route('game.loto',[$r->id,$user_room->id])->with('info','Solicitud ya enviada');
  //   } catch (\Throwable $th) {
  //     return $th;
  //     return redirect()->route('home')->with('info', 'Juego no disponible');
  //   }
  // }
}
