{{-- Modal Payment --}}
<div class="modal fade" id="collectModal" tabindex="-1" aria-labelledby="collectModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="collectModalLabel">
          <i class="bi bi-cash-coin me-2"></i>
          ¿Cuánto cobrarás?
        </h5>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form class="form-submit" action="{{ route('game.bank.collect',$r->id) }}" method="POST">
          @csrf

          <input type="hidden" name="contact_id" id="modalcollect-contact">
          <input type="hidden" name="type" value="{{ $isBanker ? 'BANK' : 'USER' }}">

          <div class="d-flex align-items-center mb-3">
            <label class="form-label text-lg me-3">Destinatario</label>
            <img src="{{ $user_room->getPhoto() }}" id="modalcollect-img" class="rounded-circle shadow-lg mg-fluid border border-primary border-3" width="50" height="50">
            <strong><span class="fs-4 ms-2" id="modalcollect-nickname">{{ $user_room->getNickname() }}</span></strong>
          </div>

          <div class="mb-3">
            <label class="form-label text-lg">Ingrese un monto</label>
            <input class="form-control form-control-lg" type="number" id="money_transfer" name="money" placeholder="Ej: $1.000" min="1" pattern="[0-9]+" required>
            <div class="text-end">
              <small class="text-danger text-end">

              </small>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label text-lg">Asunto</label>
            <input class="form-control form-control-lg" type="text" id="comment" name="comment">
          </div>

          @if (!$isBanker)
          <div class="mb-3 row">
            <label class="form-label text-lg">
              Ingresa tu <span class="btn-label"><img src="{{ asset("RoomGame.svg") }}" width="20" height="20" class="ms-2" /></span>
              <strong class="text-success">GR PASS</strong>
            </label>
            <input type="number" class="col mx-2 form-control form-control-lg text-center fw-bold" id="n1" name="n1" min="0" max="9" maxlength="1" maxlength="1" pattern="[0-9]+"  title="Formato: 1 digito" required>
            <input type="number" class="col mx-2 form-control form-control-lg text-center fw-bold" id="n2" name="n2" min="0" max="9" maxlength="1" pattern="[0-9]+"  title="Formato: 1 digito" required>
            <input type="number" class="col mx-2 form-control form-control-lg text-center fw-bold" id="n3" name="n3" min="0" max="9" maxlength="1" pattern="[0-9]+"  title="Formato: 1 digito" required>
            <input type="number" class="col mx-2 form-control form-control-lg text-center fw-bold" id="n4" name="n4" min="0" max="9" maxlength="1" pattern="[0-9]+"  title="Formato: 1 digito" required>
          </div>
          @endif

          <div class="d-grid gap-2">
            <button type="submit" id="btn-transfer" disabled class="btn btn-lg btn-primary p-3"><strong>COBRAR</strong></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
