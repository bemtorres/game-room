<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Claim;
use App\Models\Room;
use App\Services\Policies\PolicyModel;
use Illuminate\Http\Request;

class RoomController extends Controller
{
  private $policy;

  public function __construct() {
    $this->policy = new PolicyModel();
  }

  public function index() {
    $this->policy->admin();

    $rooms = Room::get();
    // $rooms = Room::where('active',true)->get();
    return view('room.index',compact('rooms'));
  }

  public function create() {
    $this->policy->admin();

    return view('room.create');
  }

  public function store(Request $request) {
    $this->policy->admin();

    $r = new Room();
    $r->user_id = current_user()->id;
    $r->name = $request->input('name');
    $r->password = $request->input('password');
    // $r->code = $request->input('code');
    $r->description = $request->input('description');
    $r->type = $request->input('type');
    $r->price = $request->input('price',0);
    $r->save();

    return redirect()->route('rooms.index')->with('success','se ha creado correctamente');
  }

  public function edit($id) {
    $this->policy->admin();
    $r = Room::findOrFail($id);
    $estados = Room::STATUS;
    return view('room.edit',compact('r','estados'));
  }

  public function show($id) {
    $this->policy->admin();

    $r = Room::findOrFail($id);
    $numbers_selected = $r->config['numbers'] ?? [];
    // return $numbers_selected;
    return view('room.show',compact('r', 'numbers_selected'));
  }

  public function update(Request $request, $id) {
    $this->policy->admin();

    $r = Room::findOrFail($id);
    $r->user_id = current_user()->id;
    $r->name = $request->input('name');
    $r->password = $request->input('password');
    $r->description = $request->input('description');
    $r->status = $request->input('status');
    $r->price = $request->input('price',0);
    $r->update();
    return back()->with('success','se ha creado correctamente');
  }

  public function active(Request $request){
    $this->policy->admin();

    $r = Room::findOrFail($request->input('id'));
    // $r->active = !$r->active;
    $r->update();

    return back()->with('success','se ha creado correctamente');
  }

  public function players($id) {
    $this->policy->admin();
    $r = Room::findOrFail($id);
    return view('room.players',compact('r'));
  }

  public function saveNumber(Request $request, $id) {
    $this->policy->admin();
    $r = Room::findOrFail($id);
    $new_numbers = $request->input('number');
    $numbers = $r->config['numbers'] ?? [];
    if ($r->status <= 2) {
      if ($new_numbers >= 0 && $new_numbers <= 90) {
        $status = false;
        foreach ($numbers as $key => $value) {
          if ($value == $new_numbers) {
            $status = true;
          }
        }

        if (!$status) {
          array_push($numbers, $new_numbers);
          $config['numbers'] = $numbers;
          $r->config = $config;
          $r->update();

          return back()->with('success','Se añadió nuevo numero');
        }
        return back()->with('info','Número ya usado');
      }
      return back()->with('info','Número no válido');
    }
    return back()->with('info','Sala terminada');
  }

  public function solicitudes($id) {
    $this->policy->admin();
    $r = Room::findOrFail($id);
    $claims = Claim::where('room_id',$r->id)->get();
    $numbers_selected = $r->config['numbers'] ?? [];

    return view('room.solicitudes',compact('r','claims','numbers_selected'));
  }

  public function solicitudesValidar(Request $request, $id) {
    $this->policy->admin();
    try {
      $r = Room::findOrFail($id);
      $claim = Claim::where('room_id',$r->id)->findOrFail($request->input('id'));
      $claim->status = $request->input('status',1);
      $claim->position = $request->input('position',null);
      $claim->update();

      return back()->with('success','Se ha guardado correctamente.');
    } catch (\Throwable $th) {
      return back()->with('danger','Error intente nuevamente.');
    }
  }
}
