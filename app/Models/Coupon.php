<?php

namespace App\Models;

use App\Casts\Json;
use App\Services\Currency;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
  protected $table = 'coupons';

  // protected $casts = [
  //   'numbers' => Json::class,
  // ];


  public function getPrice() {
    $p = new Currency($this->price);
    return $p->money();
  }

  public function coupons_users(){
    return $this->hasMany(CouponUser::class,'coupon_id')->with(['usuario'])->orderBy('created_at','desc');
  }
}
