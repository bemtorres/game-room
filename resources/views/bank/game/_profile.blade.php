@if ($isBanker)
{{-- BANK --}}
<div class="row">
  <div class="col-12 col-md-6">
    <div class="row mb-3">
      <div class="col-4 col-md-4">
        <img src="{{ asset($r->getPhoto()) }}" class="rounded-circle shadow-lg mg-fluid border border-dark border-3" width="100" height="100" alt="">
      </div>
      <div class="col-8 col-md-8">
        <h4 class="pt-2 h4 fw-bold">{{ $r->name }}</h4>
        <a href="{{ route('game.bank.play',$r->id) }}" class="btn btn-warning">Regresar como jugador</a>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-6">
    <div class="card shadow rounded-3 text-center">
      <div class="row">
        <div class="card-body">
          <h5 class="card-title text-dark fw-bold">Mi Saldo</h5>
          <h3 class="fw-bold">$ {{ $r->getBankMoney() }}</h3>
        </div>
      </div>
    </div>
  </div>
</div>
@else
{{-- USER --}}
<div class="row">
  <div class="col-12 col-md-6">
    <div class="row mb-3">
      <div class="col-4 col-md-4">
        <img src="{{ $user_room->getPhoto() }}" class="rounded-circle shadow-lg mg-fluid border border-primary border-3" width="100" height="100" alt="" data-bs-toggle="modal" data-bs-target="#avatarModal">
      </div>
      <div class="col-8 col-md-8">
        <h4 class="pt-2 h4 fw-bold">{{ $user_room->getNickname() }}</h4>

        @if ($user_room->banker)
          <a href="{{ route('game.bank.play_banker',$r->id) }}" class="btn btn-primary">Cambiar a Banquero</a>
        @endif

      </div>
    </div>
  </div>
  <div class="col-12 col-md-6">
    <div class="card shadow rounded-3 text-center">
      <div class="row">
        <div class="card-body">
          <h5 class="card-title text-dark fw-bold">Mi Saldo</h5>
          <h3 class="fw-bold">$ <span id="money_balance">{{ $user_room->getMoney() }}</span></h3>
        </div>
      </div>
    </div>
  </div>
</div>
@endif
