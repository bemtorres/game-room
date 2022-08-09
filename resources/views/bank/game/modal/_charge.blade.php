{{-- Modal Cobrar --}}
<div class="modal fade" id="chargeModal" tabindex="-1" aria-labelledby="chargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="chargeModalLabel">
          <i class="bi bi-cash-coin me-2"></i>
          ¿Cuánto cobrarás?
        </h5>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form class="form-submit" action="{{ route('game.bank.charge',$r->id) }}" method="POST">
          @csrf

          <input type="hidden" name="contact_id" id="modalcharge-contact">
          <input type="hidden" name="type" value="{{ $isBanker ? 'BANK' : 'USER' }}">

          <div class="d-flex align-items-center mb-3">
            <label class="form-label text-lg me-3">Destinatario</label>
            <img src="{{ $user_room->getPhoto() }}" id="modalcharge-img" class="rounded-circle shadow-lg mg-fluid border border-primary border-3" width="50" height="50">
            <strong><span class="fs-4 ms-2" id="modalcharge-nickname">{{ $user_room->getNickname() }}</span></strong>
          </div>

          <div class="mb-3">
            <label class="form-label text-lg">Ingrese un monto</label>
            <input class="form-control form-control-lg" type="number" id="money_modalcharge" name="money" placeholder="Ej: $1.000" min="1" pattern="[0-9]+" required>
            <div class="text-end">
              <small class="text-danger text-end">

              </small>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label text-lg">Asunto</label>
            <input class="form-control form-control-lg" type="text" id="comment_modalcharge" name="comment">
          </div>

          <div class="d-grid gap-2">
            <button type="submit" id="btn-charge" class="btn btn-lg btn-primary p-3"><strong>COBRAR</strong></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
