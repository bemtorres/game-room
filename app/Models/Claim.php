<?php

namespace App\Models;

use App\Casts\Json;
use App\Services\ConvertDatetime;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
  protected $table = 'claim';

  const STATUS = [
    1 => ['PENDIENTE','fas fa-pause-circle','warning'],
    2 => ['ACEPTADO','fas fa-play-circle','success'],
    3 => ['CANCELADO','fas fa-times-circle','danger']
  ];

  const PLACE = [
    1 => 'fa fa-trophy text-warning',
    2 => 'fa fa-medal text-secondary',
    3 => 'fa fa-medal text-warning',
    4 => 'fa fa-award text-success'
  ];

  public function room(){
    return $this->belongsTo(Room::class,'room_id');
  }

  public function loto(){
    return $this->belongsTo(LotoCard::class,'loto_id');
  }

  public function usuario_validate(){
    return $this->belongsTo(User::class,'validated_user_id');
  }

  public function usuario_claim(){
    return $this->belongsTo(User::class,'claim_user_id');
  }

  public function user_room(){
    return $this->belongsTo(UserRoom::class,'room_user_id');
  }

  public function getStatus() {
    return self::STATUS[$this->status];
  }

  public function getFechaCreacion(){
    return new ConvertDatetime($this->created_at);
  }
  // public function loto(){
  //   return $this->belongsTo(LotoCard::class,'loto_id');
  // }

  public function getPlace() {
    if ($this->position) {
      if ($this->position <= 3) {
        return self::PLACE[$this->position];
      } else {
        return self::PLACE[4];
      }
    }
    return '';
  }
}
