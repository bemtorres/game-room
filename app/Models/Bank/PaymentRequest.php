<?php

namespace App\Models\Bank;

use App\Casts\Json;
use App\Models\User;
use App\Models\UserRoom;
use App\Services\BankProfile;
use App\Services\ConvertDatetime;
use App\Services\Currency;
use Illuminate\Database\Eloquent\Model;

class PaymentRequest extends Model
{
  protected $table = 'bank_payment_requests';

  protected $casts = [
    'config' => Json::class,
  ];

  const STATUS = [
    1 => 'enviado',
    2 => 'recibido',
    3 => 'cancelado'
  ];

  public function getMoney() {
    $m = new Currency($this->money ?? 0);
    return $m->money() ?? 0;
  }

  public function getConfigComment() {
    return $this->config['comment'] ?? '';
  }

  //son los registro no usuario
  // Emisor
  public function transmitter_user() {
    return $this->belongsTo(UserRoom::class,'transmitter_user_id');
  }

  // Receptor
  public function receiver_user() {
    return $this->belongsTo(UserRoom::class,'receiver_user_id');
  }

  public function getFechaCreacion(){
    return new ConvertDatetime($this->created_at);
  }


}

  // room_id
  // user_room_id
  // type                | IN - OUT
  // money_bank          | si es dinero del banco
  // transmitter_user_id | emisor   - Que envia  [banco -1]
  // receiver_user_id    | receptor - Que recibe [banco -1]
  // money               | dinero de la transaccion
  // status              | 1 enviada/espera / 2 aceptado / 3 cancelada
