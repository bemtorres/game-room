<?php

namespace App\Models;

use App\Casts\Json;
use App\Services\Currency;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
  protected $table = 'rooms';

  const STATUS = [
    1 => ['PENDIENTE','fas fa-pause-circle','warning'],
    2 => ['JUGANDO','fas fa-play-circle','primary'],
    3 => ['FINALIZADO','fas fa-check-circle','success'],
    4 => ['CANCELADO','fas fa-times-circle','danger']
  ];

  protected $casts = [
    'config' => Json::class,
  ];

  public function getPrice() {
    if (!empty($this->price)) {
      $p = new Currency($this->price);
      return $p->money();
    }
    return 0;
  }

  public function getStatus() {
    return self::STATUS[$this->status];
  }

  public function players(){
    return $this->hasMany(UserRoom::class,'room_id')->with(['usuario','loto'])->orderBy('created_at','desc');
  }

  public function getNumberSelected() {
    return $this->config['numbers'] ?? [];
  }
}
