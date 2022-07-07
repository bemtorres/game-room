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

  public function players_bank(){
    return $this->hasMany(UserRoom::class,'room_id')->with(['usuario'])->orderBy('created_at','desc');
  }

  public function getNumberSelected() {
    return $this->config['numbers'] ?? [];
  }

  //1 Lotería
  //2 banco
  public function getPhoto() {
    if ($this->type == 1) {
      return 'assets/game/loteria.svg';
    }

    return 'assets/game/banco.svg';
  }

  public function getBankMoney() {
    $m = new Currency($this->banker_money ?? 0);
    return $m->money() ?? 0;
  }

  public function getConfigEnableRegister() {
    return $this->config['enable_register'] ?? false;
    //
  }

  public function getConfigEnablePublic() {
    return $this->config['enable_public'] ?? false;
    //
  }
}
