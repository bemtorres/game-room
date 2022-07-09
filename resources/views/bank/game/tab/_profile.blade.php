@if (!$isBanker)
  <div class="card shadow rounded-3">
    <div class="card-body">
      <form class="form-submit" action="{{ route('game.bank.profile',$r->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label class="form-label text-lg">Cambia tu nombre</label>
          <input class="form-control form-control-lg" type="text" id="nickname" name="nickname" value="{{ $user_room->getNickname() }}" required>
        </div>

        <div class="mb-3">
          <label class="form-label text-lg">Cambia tu color</label>

          <input id="color-picker" class="form-control form-control-lg" name="color" value="{{ $user_room->getColor() ?? '0d6efd'}}" required>
        </div>

        <div class="md-3 row">
          <label class="form-label text-lg">Cambia tu <span class="btn-label"><img src="{{ asset("RoomGame.svg") }}" width="20" height="20" class="ms-2" /></span>
            <strong class="text-success">GR PASS</strong>
          </label>
          <input type="number" class="col mx-2 form-control form-control-lg text-center fw-bold" id="nn1" name="n1" min="0" max="9" maxlength="1" maxlength="1" pattern="[0-9]+"  title="Formato: 1 digito" required>
          <input type="number" class="col mx-2 form-control form-control-lg text-center fw-bold" id="nn2" name="n2" min="0" max="9" maxlength="1" pattern="[0-9]+"  title="Formato: 1 digito" required>
          <input type="number" class="col mx-2 form-control form-control-lg text-center fw-bold" id="nn3" name="n3" min="0" max="9" maxlength="1" pattern="[0-9]+"  title="Formato: 1 digito" required>
          <input type="number" class="col mx-2 form-control form-control-lg text-center fw-bold" id="nn4" name="n4" min="0" max="9" maxlength="1" pattern="[0-9]+"  title="Formato: 1 digito" required>
        </div>

        <div class="text-center mt-3 d-grid gap-2">
          <button type="submit" id="btn-play" disabled class="btn btn-lg btn-primary p-3">
            <strong>GUARDAR</strong>
          </button>
        </div>
      </form>
    </div>
  </div>
@else
  <div class="card row shadow rounded-3">
    <div class="col-12 text-center p-4">
      <img src="{{ asset($r->getPhoto()) }}" class="rounded-circle shadow-lg mg-fluid border border-dark border-3" width="100" height="100" alt="">
    </div>
  </div>
@endif
