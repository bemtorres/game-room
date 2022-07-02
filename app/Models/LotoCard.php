<?php

namespace App\Models;

use App\Casts\Json;
use Illuminate\Database\Eloquent\Model;

class LotoCard extends Model
{
  protected $table = 'loto_cards';

  protected $casts = [
    'numbers' => Json::class,
  ];

  public function getBoleto() {
    return $this->numbers;
  }

  // public function getCode() {
  //   return $this->numbers['code'] ?? [];
  // }

  public function getCode() {
    return explode(",", $this->code);
  }
}
