<div class="card shadow rounded-3">
  <div class="card-body">
    <div class="text-center fw-bold">
      Últimos Movimientos
    </div>
    <div class="table-wrapper-scroll-y my-custom-scrollbar">
      <table class="table table-hover">
        <tbody>
          @foreach ($transactions as $trans)
            @php
              $date = $trans->getFechaCreacion()->getDateV3();
              $money = $trans->getMoney();
              $type = 'IN';
              $comment = $trans->getConfigComment();
              $img = "";
              $name = "";

              if ($trans->transmitter_user_id == 0) { // el banco envia dinero
                if ($isBanker) {
                  $type = 'OUT';
                  $img = asset($trans->receiver_user->getPhoto()) ?? '';
                  $name = $trans->receiver_user->getNickname() ?? '';
                } else {
                  $img = asset($r->getPhoto()) ?? '';
                  $name = $r->name;
                }

              } else {
                if ($trans->transmitter_user_id == $user_room->id) { // usuario envia
                  $type = 'OUT';
                  if ($trans->receiver_user_id == 0) {
                    if ($isBanker) {
                      $type = 'IN';
                      $img = asset($trans->transmitter_user->getPhoto()) ?? '';
                      $name = $trans->transmitter_user->getNickname() ?? '';
                    } else {
                      $img = asset($r->getPhoto()) ?? '';
                      $name = $r->name;
                    }
                  } else {
                    $img = asset($trans->receiver_user->getPhoto()) ?? '';
                    $name = $trans->receiver_user->getNickname() ?? '';
                  }
                } else {
                  $img = asset($trans->transmitter_user->getPhoto()) ?? '';
                  $name = $trans->transmitter_user->getNickname() ?? '';
                }
              }

            @endphp
            <tr>
              @component('bank.game._list_pay')
                @slot('img', $img)
                @slot('date', $date)
                @slot('name', $name)
                @slot('comment', $comment)
                @slot('type', $type)
                @slot('money', $money)
                @slot('isMobile', $isMobile)
              @endcomponent
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
