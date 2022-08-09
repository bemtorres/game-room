<?php

namespace App\Models;

use App\Casts\Json;
use App\Services\Currency;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
  use HasFactory;
  // use SoftDeletes;
  use Notifiable;

  protected $casts = [
    'config' => Json::class,
  ];

  protected $table = 'users';

  protected $guard = 'usuario';

  public function cuentas(){
    return $this->hasMany(Account::class,'user_id')->orderBy('created_at','desc');
  }

  public function cupones(){
    return $this->hasMany(CouponUser::class,'user_id')->orderBy('created_at','desc');
  }

  public function getCredit() {
    $p = new Currency($this->credit);
    return $p->money();
  }

  public function trofeos(){
    return $this->hasMany(Claim::class,'claim_user_id','id')->orderBy('created_at','desc');
  }

  public function getPageCollapse() {
    return ($this->config['page_collapse'] ?? 'x') == 'active' ? true : false;
  }

  // public function cupones(){
  //   return $this->belongsTo(Usuario::class,'id_usuario');
  // }

}
