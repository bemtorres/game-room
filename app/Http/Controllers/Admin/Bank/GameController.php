<?php

namespace App\Http\Controllers\Admin\Bank;

use Jenssegers\Agent\Agent;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Claim;
use App\Models\LotoCard;
use App\Models\Room;
use App\Models\User;
use App\Models\UserRoom;
use App\Services\Policies\PolicyModel;
use Illuminate\Http\Request;


class GameController extends Controller
{
  public function show($room_id) {
    try {
      $r = Room::where('active',true)->where('status','<>',4)->findOrFail($room_id);
      $user_room = UserRoom::where('room_id',$r->id)->where('user_id',current_user()->id)->first();

      if ($user_room) {
        return redirect()->route('game.bank.play', $r->id);
      }

      return view('bank.game.index',compact('r'));
    } catch (\Throwable $th) {
      return redirect()->route('home')->with('info', 'Juego no disponible');
    }
  }

  public function enrollment(Request $request, $room_id) {
    try {
      $r = Room::where('active',true)->where('status',1)->findOrFail($room_id);
      $user_room = UserRoom::where('room_id',$r->id)->where('user_id',current_user()->id)->first();

      if (current_user()->credit < $r->price) {
        return back()->with('info','Ingresos insuficientes');
      }

      if (empty($user_room)) {
        $pass = $request->input('n1') . $request->input('n2') . $request->input('n3') . $request->input('n4');
        $nickname = $request->input('nickname');
        $img = $request->input('imagen');

        $config = [
          'pass' => $pass,
          'nickname' => $nickname,
          'img' => $img,
        ];

        $ur = new UserRoom();
        $ur->room_id = $room_id;
        $ur->user_id = current_user()->id;
        $ur->money   = 0;
        $ur->banker  = false;
        $ur->config  = $config;
        $ur->save();

        $r->cont_users++;
        $r->update();

        $u = User::find(current_user()->id);
        $u->credit -= $r->price;
        $u->update();

        $a = new Account();
        $a->user_id = current_user()->id;
        $a->room_id = $r->id;
        $a->description = 'INGRESO JUEGO BANCO | SALA ' . $r->id;
        $a->price = $r->price * -1;
        $a->save();
      }

      return redirect()->route('game.bank.play', $r->id);
    } catch (\Throwable $th) {

      return $th;
    // return redirect()->route('home')->with('info', 'Juego no disponible');
    }
  }

  public function play($room_id) {
    $r = Room::where('active',true)->where('status','<>',4)->findOrFail($room_id);
    $user_room = UserRoom::where('room_id',$room_id)
                                ->where('user_id',current_user()->id)
                                ->with(['room'])
                                ->firstOrFail();
    $contacts = UserRoom::where('room_id',$room_id)->where('user_id', '!=', current_user()->id)->get();

    $isBanker = false;
    $agent = new Agent();
    $isMobile = $agent->isMobile();

    return view('bank.game.play',compact('r','user_room', 'contacts', 'isBanker', 'isMobile'));
  }

  public function playBanker($room_id) {
    $r = Room::where('active',true)->where('status','<>',4)->findOrFail($room_id);
    $user_room = UserRoom::where('room_id',$room_id)
                                ->where('user_id',current_user()->id)
                                // ->where('banker',true)
                                ->with(['room'])
                                ->firstOrFail();

    $contacts = UserRoom::where('room_id',$room_id)->get();

    $isBanker = true;
    $agent = new Agent();
    $isMobile = $agent->isMobile();

    return view('bank.game.play',compact('r','user_room', 'contacts', 'isBanker', 'isMobile'));
  }

  public function transfer(Request $request, $room_id) {

    $status_code = 'error';
    $status_resp = 'Error intente nuevamente';

    $r = Room::where('active',true)->where('status','<>',4)->findOrFail($room_id);
    $user_room = UserRoom::where('room_id',$room_id)
                                ->where('user_id',current_user()->id)
                                ->firstOrFail();

    $contacts = UserRoom::where('room_id',$room_id)->get();

    $contact_id = $request->input('contact_id');
    $pass = $request->input('n1') . $request->input('n2') . $request->input('n3') . $request->input('n4');
    $money = $request->input('money');
    $comment = $request->input('comment');

    $type = $request->input('type'); //BANK : USER


    if ($pass == $user_room->getPassword()) {
      if ($user_room->money > 0) {
        if ($contact_id == 0) { // Banco

        } else { // contact

        }

      } else {
        $status_resp = 'Error, No tienes fondos disponibles';
      }
    } else {
      $status_resp = 'Error, GR PASS incorrecta';
    }

    return back()->with($status_code, $status_resp);
  }

  public function profile(Request $request, $room_id) {
    $pass = $request->input('n1') . $request->input('n2') . $request->input('n3') . $request->input('n4');
    $nickname = $request->input('nickname');
    $img = $request->input('imagen');

    $config = [
      'pass' => $pass,
      'nickname' => $nickname,
      'img' => $img,
    ];

    $user_room = UserRoom::where('room_id',$room_id)
                            ->where('user_id',current_user()->id)
                            ->firstOrFail();

    $user_room->config = $config;
    $user_room->update();

    return back()->with('success', 'actualizado');
  }
}
