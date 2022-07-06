<?php

namespace App\Models\Bank;

use App\Casts\Json;
use App\Services\ConvertDatetime;
use App\Services\Currency;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
  protected $table = 'bank_transactions';

  public function getMoney() {
    $m = new Currency($this->money ?? 0);
    return $m->money() ?? 0;
  }
}

  // room_id
  // user_room_id
  // type                | IN - OUT
  // money_bank          | si es dinero del banco
  // transmitter_user_id | emisor   - Que envia  [banco -1]
  // receiver_user_id    | receptor - Que recibe [banco -1]
  // money               | dinero de la transaccion
