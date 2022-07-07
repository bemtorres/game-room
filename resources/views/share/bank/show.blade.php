@extends('layouts.app_simple')
@push('stylesheet')
@endpush
@section('content')
  <main class="d-flex w-100">
    <div class="container d-flex flex-column">
      <div class="row vh-100">
        <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
          <div class="d-table-cell align-middle">
            <div class="text-center mb-4">
              <h1 class="h2">Welcome to <strong>GameRoom</strong> 🎮 🕹️</h1>
              <p class="lead">
                Un sistema contable para todo tipo de juegos de mesas
                ♣️♥️♦️
              </p>
            </div>

            <div class="card">
              <div class="card-body">
                <div class="m-sm-4">
                  {{-- <div class="text-center">
                    <img src="img/avatars/avatar.jpg" alt="Charles Hall" class="img-fluid rounded-circle" width="132" height="132" />
                  </div> --}}
                  <form class="form-signin form-submit" action="{{ route('app.room.share', $r->url) }}" method="post">
                    @csrf
                    <div class="mb-3">
                      <label class="form-label">Email</label>
                      <input class="form-control form-control-lg" type="email" name="email" value="" placeholder="Ingresa tu correo" autocomplete="new-email" required />
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Password</label>
                      <input class="form-control form-control-lg" type="password" name="password" value="" placeholder="*********" autocomplete="new-password" required />
                    </div>
                    <div class="text-center mt-3 d-grid gap-2 mb-3">
                      <button type="submit" class="btn btn-lg btn-block btn-dark"><strong>JOIN</strong></button>
                    </div>

                    @if ($r->getConfigEnableRegister())
                      <div class="text-center mt-3 d-grid gap-2">
                        <a href="{{ route('app.room.account', $r->url) }}" class="btn btn-lg btn-block btn-info"><strong>CREAR CUENTA</strong></a>
                      </div>
                    @endif
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
@push('javascript')

@endpush
