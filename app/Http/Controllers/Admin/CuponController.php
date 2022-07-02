<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Room;
use App\Services\Policies\PolicyModel;
use Illuminate\Http\Request;

class CuponController extends Controller
{
  private $policy;

  public function __construct() {
    $this->policy = new PolicyModel();
  }

  public function index() {
    $this->policy->admin();
    $cupones = Coupon::get();
    return view('cupon.index',compact('cupones'));
  }

  public function create() {
    return view('cupon.create');
  }

  public function store(Request $request) {
    $this->policy->admin();
    try {
      $c = new Coupon();
      $c->user_id = current_user()->id;
      $c->name = $request->input('name');
      $c->code = $request->input('code');
      $c->description = $request->input('description');
      $c->password = $request->input('password');
      $c->price = $request->input('price',0);
      $c->save();
      return redirect()->route('cupons.index')->with('success','se ha creado correctamente');
    } catch (\Throwable $th) {
      return back()->with('info','Código en uso');
    }
  }

  public function edit($id) {
    $this->policy->admin();

    $c = Coupon::findOrFail($id);
    return view('cupon.edit',compact('c'));
  }

  public function update(Request $request, $id) {
    $this->policy->admin();

    $c = Coupon::findOrFail($id);
    $c->name = $request->input('name');
    $c->code = $request->input('code');
    $c->description = $request->input('description');
    $c->password = $request->input('password');
    $c->price = $request->input('price',0);
    $c->update();
    return back()->with('success','se ha creado correctamente');
  }


  public function active(Request $request){
    $this->policy->admin();

    $c = Coupon::findOrFail($request->input('id'));
    $c->active = !$c->active;
    $c->update();

    return back()->with('success','se ha creado correctamente');
  }
}
