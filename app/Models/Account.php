<?php

namespace App\Models;

use App\Casts\Json;
use App\Services\ConvertDatetime;
use App\Services\Currency;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
  protected $table = 'account';

  // protected $casts = [
  //   'numbers' => Json::class,
  // ];
  public function cupon(){
    return $this->belongsTo(Coupon::class,'coupon_id');
  }

  public function usuario(){
    return $this->belongsTo(User::class,'user_id');
  }

  public function getPrice() {
    $p = new Currency($this->price);
    return $p->money();
  }

  public function getFechaCreacion(){
    return new ConvertDatetime($this->created_at);
  }
}
