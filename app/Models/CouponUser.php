<?php

namespace App\Models;

use App\Casts\Json;
use App\Services\Currency;
use Illuminate\Database\Eloquent\Model;

class CouponUser extends Model
{
  protected $table = 'coupons_users';

  public function cupon(){
    return $this->belongsTo(Coupon::class,'coupon_id');
  }

  public function usuario(){
    return $this->belongsTo(User::class,'user_id');
  }
}
