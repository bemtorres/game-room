<?php

namespace App\Models;

use App\Casts\Json;
use Illuminate\Database\Eloquent\Model;

class UserRoom extends Model
{
  protected $table = 'rooms_users';

  // protected $casts = [
  //   'numbers' => Json::class,
  // ];
  public function room(){
    return $this->belongsTo(Room::class,'room_id');
  }

  public function usuario(){
    return $this->belongsTo(User::class,'user_id');
  }

  public function loto(){
    return $this->belongsTo(LotoCard::class,'loto_id');
  }
}
