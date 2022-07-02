<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\User;
use App\Services\Policies\PolicyModel;
use Illuminate\Http\Request;

use Rap2hpoutre\FastExcel\FastExcel;
class UsuarioController extends Controller
{
  private $policy;

  public function __construct() {
    $this->policy = new PolicyModel();
  }

  public function index() {
    $this->policy->admin();

    $usuarios = User::where('admin',false)->get();
    // $rooms = Room::where('active',true)->get();
    return view('user.index',compact('usuarios'));
  }

  public function admin() {
    $this->policy->admin();

    $usuarios = User::where('admin',true)->get();
    // $rooms = Room::where('active',true)->get();
    return view('user.index',compact('usuarios'));
  }

  public function create() {
    $this->policy->admin();

    return view('user.create');
  }

  public function masiva() {
    $this->policy->admin();

    return view('user.masiva');
  }

  public function show($id) {
    $this->policy->admin();

    $u = User::findOrFail($id);
    return view('user.show',compact('u'));
  }


  public function edit($id) {
    $this->policy->admin();

    $u = User::findOrFail($id);
    return view('user.edit',compact('u'));
  }

  public function creditos($id) {
    $this->policy->admin();

    $u = User::findOrFail($id);
    return view('user.cuenta',compact('u'));
  }

  public function store(Request $request) {
    $this->policy->admin();
    try {
      $u = new User();
      $u->email = $request->input('email');
      $u->password = hash('sha256',$request->input('password'));
      $u->name = $request->input('name');
      $u->credit = $request->input('credit',0);
      $u->phone = $request->input('phone');
      $u->admin = $request->input('admin') ? true : false;
      $u->save();

      if ($u->credit > 0) {
        $a = new Account();
        $a->user_id = $u->id;
        $a->description = 'ABONO CREACIÓN';
        $a->price = $u->credit;
        $a->save();
      }
      if ($u->admin) {
        return redirect()->route('user.admin')->with('success','Se ha creado correctamente');
      }
      return redirect()->route('usuarios.index')->with('success','Se ha creado correctamente');
    } catch (\Throwable $th) {
      return back()->with('danger','Error intente nuevamente');
    }
  }

  public function update(Request $request, $id) {
    $this->policy->admin();
    try {
      $u = User::findOrFail($id);
      $u->email = $request->input('email');
      // $u->password = hash('sha256',$request->input('password'));
      $u->name = $request->input('name');
      // $u->credit = $request->input('credit',0);
      $u->phone = $request->input('phone');
      $u->admin = $request->input('admin') ? true : false;
      $u->update();

      return back()->with('success','Se ha actualizado');
    } catch (\Throwable $th) {
      return back()->with('danger','Error intente nuevamente');
    }
  }

  public function password(Request $request, $id) {
    $this->policy->admin();
    try {
      $u = User::findOrFail($id);
      $u->password = hash('sha256',$request->input('password'));
      $u->update();
      return back()->with('success','Se ha actualizado');
    } catch (\Throwable $th) {
      return back()->with('danger','Error intente nuevamente');
    }
  }

  public function credit(Request $request, $id) {
    $this->policy->admin();
    try {
      $credit = $request->input('credit',0);
      if ($credit != 0) {
        $u = User::findOrFail($id);
        $u->credit += $credit;
        $u->update();

        $a = new Account();
        $a->user_id = $u->id;
        $a->description = $request->input('name');
        $a->price = $credit;
        $a->save();
        return back()->with('success','Se ha actualizado');
      }
      return back()->with('danger','Error intente nuevamente');
    } catch (\Throwable $th) {
      return back()->with('danger','Error intente nuevamente');
    }
  }

  public function import(Request $request) {
    $this->policy->admin();
    try {
      $documento = $request->file('document');

      $array_users = array();
      $emails_users = array();
      $data = (new FastExcel)->import($documento);
      foreach ($data as $line) {
        $user = array(
          'email'     => $line['EMAIL'],
          'name'      => $line['NAME'],
          'password'  => $line['PASSWORD'] ?? null,
          'phone'     => $line['PHONE'] ?? '',
          'credit'    => $line['CREDIT'] ?? 0,
          'status'    => [
            "new" => true,
          ],
        );
        $array_users[$line['EMAIL']] = $user;
        array_push($emails_users, $line['EMAIL']);
      }

      //Agregar
      $usuarios = User::whereIn('email',$emails_users)->get();

      foreach ($usuarios as $us) {
        $array_users[$us->email]['status']['new'] = false;
      }

      foreach ($array_users as $email => $user) {
        if ($user['status']['new']) {
          $u = new User();
          $u->email =  $user['email'];
          $u->password = $user['password'] ? hash('sha256',$user['password']) : '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92';
          $u->name    =  $user['name'];
          $u->credit  = $user['credit'];
          $u->phone   = $user['phone'];
          $u->save();

          if ($u->credit > 0) {
            $a = new Account();
            $a->user_id = $u->id;
            $a->description = 'ABONO CREACIÓN';
            $a->price = $u->credit;
            $a->save();
          }
        }
      }
      return view('user.import', compact('array_users'))->with('success','cargados con exito');
    } catch (\Throwable $th) {
      return back()->with('danger','Error!');
    }
  }

  // public function game($id) {
  //   $this->policy->admin();
  //   $u = User::findOrFail($id);
  //   return view('user.game',compact('u'));
  // }
}
