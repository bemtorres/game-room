<?php

namespace App\Models;

use App\Casts\Json;
use App\Services\Currency;
use Illuminate\Database\Eloquent\Model;

class UserRoom extends Model
{
  protected $table = 'rooms_users';

  protected $casts = [
    'config' => Json::class,
  ];

  public function room(){
    return $this->belongsTo(Room::class,'room_id');
  }

  public function usuario(){
    return $this->belongsTo(User::class,'user_id');
  }

  public function loto(){
    return $this->belongsTo(LotoCard::class,'loto_id');
  }

  public function getMoney() {
    $p = new Currency($this->money);
    return $p->money() ?? 0;
  }

  public function getPhoto() {
    $img = $this->config['img'] ?? 1;
    return asset('assets/game/personajes/'.$img.".png");
  }

  public function getNickname() {
    return $this->config['nickname'] ?? '';
  }

  public function getPassword() {
    return $this->config['pass'] ?? '';
  }

  //
}
