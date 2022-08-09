{{-- Modal TOPAY --}}
@if ($payment_requests)
<div class="modal fade" id="topayModal" tabindex="-1" aria-labelledby="topayModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="topayModalLabel">
          <i class="bi bi-credit-card me-2"></i>
          Solicitud de pago
        </h5>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form class="form-submit" action="{{ route('game.bank.payment',$r->id) }}" method="POST">
          @csrf

          <input type="hidden" name="contact_id" id="modalpt-contact">
          <input type="hidden" name="request_id" id="modalpt-request">
          <input type="hidden" name="token_payment" id="modalpt-token">
          <input type="hidden" name="type" value="{{ $isBanker ? 'BANK' : 'USER' }}">

          <div class="d-flex align-items-center mb-3">
            <label class="form-label text-lg me-3">Cobrador</label>
            <img src="{{ $user_room->getPhoto() }}" id="modalpt-img" class="rounded-circle shadow-lg mg-fluid border border-primary border-3" width="50" height="50">
            <strong><span class="fs-4 ms-2" id="modalpt-nickname">{{ $user_room->getNickname() }}</span></strong>
          </div>


          <div class="mb-3">
            <label class="form-label text-lg">Monto solicitado</label>
            <input class="form-control form-control-lg" type="text" readonly type="text" id="modalpt_transfer" required>
          </div>

          <div class="mb-3">
            <label class="form-label text-lg">Asunto</label>
            <input class="form-control form-control-lg" readonly type="text" id="modalpt_comment" name="comment">
          </div>

          @php
              $is_saldo = false;
              $saldo = $isBanker ? $r->banker_money : $user_room->money;

              if ($payment_requests->money <= $saldo) {
                $is_saldo = true;
              }
          @endphp

          @if (!$isBanker && $is_saldo)
          <div class="mb-3 row">
            <label class="form-label text-lg">
              Ingresa tu <span class="btn-label"><img src="{{ asset("RoomGame.svg") }}" width="20" height="20" class="ms-2" /></span>
              <strong class="text-success">GR PASS</strong>
            </label>
            <input type="number" class="col mx-2 form-control form-control-lg text-center fw-bold" id="nnn1" name="n1" min="0" max="9" maxlength="1" maxlength="1" pattern="[0-9]+"  title="Formato: 1 digito" required>
            <input type="number" class="col mx-2 form-control form-control-lg text-center fw-bold" id="nnn2" name="n2" min="0" max="9" maxlength="1" pattern="[0-9]+"  title="Formato: 1 digito" required>
            <input type="number" class="col mx-2 form-control form-control-lg text-center fw-bold" id="nnn3" name="n3" min="0" max="9" maxlength="1" pattern="[0-9]+"  title="Formato: 1 digito" required>
            <input type="number" class="col mx-2 form-control form-control-lg text-center fw-bold" id="nnn4" name="n4" min="0" max="9" maxlength="1" pattern="[0-9]+"  title="Formato: 1 digito" required>
          </div>
          @endif

          <div class="d-grid gap-2 mb-2">
            @if (!$is_saldo)
              <button type="button" id="btn-to-pay" class="btn btn-lg btn-secondary p-3">
                <strong>NO TIENES SALDO DISPONIBLE</strong>
              </button>
            @else
              <button type="submit" id="btn-to-pay" class="btn btn-lg btn-primary p-3">
                <strong>PAGAR</strong>
              </button>
            @endif
          </div>
        </form>
        <form class="form-submit" action="{{ route('game.bank.charge_cancel', $r->id) }}" method="post">
          @csrf
          @method('DELETE')
          <input type="hidden" name="request_id" id="modalptcancel-request">
          <input type="hidden" name="token_payment" id="modalptcancel-token">
          <input type="hidden" name="type" value="{{ $isBanker ? 'BANK' : 'USER' }}">
          <div class="d-grid gap-2">
              <button type="submit" id="btn-transfer" class="btn btn-lg btn-danger p-3"><strong>CANCELAR</strong></button>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>
@endif
