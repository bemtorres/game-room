@extends("layouts.skeleton")
@push("stylesheet")

<style>
  body {
    background: #d9dbe0 !important;
  }

  .my-custom-scrollbar {
    position: relative;
    height: {{ $isMobile ? '240px' : '340px' }};
    overflow: auto;
  }


  .my-custom-scrollbar-img {
    position: relative;
    height: 120px;
    overflow: auto;
  }

  .table-wrapper-scroll-y {
    display: block;
  }

  .navbar_down {
    overflow: hidden;
    /* background-color: #333; */
    position: fixed; /* Set the navbar to fixed position */
    /* top: 0; Position the navbar at the top of the page */
    bottom: 0;
    width: 100%; /* Full width */
  }

  .col img{
      height:100px;
      width: 100%;
      cursor: pointer;
      transition: transform 1s;
      object-fit: cover;
    }
    .col label{
      overflow: hidden;
      position: relative;
    }
    .imgbgchk:checked + label>.tick_container{
      opacity: 1;
    }
    /*         aNIMATION */
    .imgbgchk:checked + label>img{
      transform: scale(1.25);
      opacity: 0.3;
    }
    .tick_container {
      transition: .5s ease;
      opacity: 0;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      cursor: pointer;
      text-align: center;
    }
    .tick {
      background-color: #4CAF50;
      color: white;
      font-size: 16px;
      padding: 6px 12px;
      height: 40px;
      width: 40px;
      border-radius: 100%;
    }


</style>
@endpush
@section("app")
  <main class="d-flex w-100">
    <div class="container d-flex flex-column">
      <div class="row mt-3">
        <div class="col-sm-12 col-md-10 col-lg-8 mx-auto d-table h-100">
          <div class="d-table-cell align-middle">


            @include('bank.game._profile')

            @if (!$isMobile)
            <ul class="bg-white p-3 shadow rounded-3 nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                  <i class="fa-2x bi bi-wallet2"></i>
                  <span class="small d-block">Historial</span>
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-transfer-tab" data-bs-toggle="pill" data-bs-target="#pills-transfer" type="button" role="tab" aria-controls="pills-transfer" aria-selected="false">
                  <i class="fa-2x bi bi-credit-card"></i>
                  <span class="small d-block">Depositar</span>
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                  <i class="fa-2x bi bi-person-circle"></i>
                  <span class="small d-block">Perfil</span>
                </button>
              </li>
            </ul>
            @endif

            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                <div class="card shadow rounded-3">
                  <div class="card-body">
                    <div class="text-center fw-bold">
                      Últimos Movimientos
                    </div>
                    <div class="table-wrapper-scroll-y my-custom-scrollbar">
                      <table class="table table-hover">
                        <tbody>
                          @for ($i = 0; $i < 20; $i++)
                            <tr>
                              @if ($i % 2 == 0)
                                @component('bank.game._list_pay')
                                  @slot('img', asset($user_room->getPhoto()))
                                  @slot('date', '20/20/2020')
                                  @slot('comment', 'Entrega de persona uno')
                                  @slot('type', 'OUT')
                                  @slot('money', '10.000')
                                  @slot('isMobile', $isMobile)
                                @endcomponent
                              @else
                                @component('bank.game._list_pay')
                                  @slot('img', asset($user_room->getPhoto()))
                                  @slot('date', '20/20/2020')
                                  @slot('comment', 'Entrega de persona uno')
                                  @slot('type', 'IN')
                                  @slot('money', '100.000')
                                  @slot('isMobile', $isMobile)
                                @endcomponent
                              @endif
                            </tr>
                          @endfor
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <div class="tab-pane fade" id="pills-transfer" role="tabpanel" aria-labelledby="pills-transfer-tab" tabindex="0">

                <div class="card shadow rounded-3">
                  <div class="card-body">
                    <div class="text-center fw-bold">
                      Contactos
                    </div>
                    <div class="table-wrapper-scroll-y my-custom-scrollbar">

                      <table class="table table-hover">
                        <tbody>
                          @if (!$isBanker)
                          <tr data-bs-toggle="modal" data-bs-target="#transferModal" data-contact="0">
                            <td>
                              <img src="{{ asset($r->getPhoto()) }}" width="60px" height="60px" class="img-fluid rounded" alt="...">
                            </td>
                            <td>
                              <p class="fw-bold h6">BANCO</p>
                            </td>
                          </tr>
                          @endif
                          @foreach ($contacts as $c)
                          <tr>
                            <td data-bs-toggle="modal" data-bs-target="#transferModal" data-contact="{{ $c->id }}">
                              <img src="{{ $c->getPhoto() }}" width="60px" height="60px" class="img-fluid rounded" alt="">
                            </td>
                            <td>
                              <p class="fw-bold h6">{{ $c->getNickname() }}</p>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>

                  </div>
                </div>

              </div>

              <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">

                @if (!$isBanker)
                  <div class="card shadow rounded-3">
                    <div class="card-body">
                      <form class="form-submit" action="{{ route('game.bank.profile',$r->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                          <label class="form-label text-lg">Cambia tu nombre</label>
                          <input class="form-control form-control-lg" type="text" id="nickname" name="nickname" value="{{ current_user()->name }}" required>
                        </div>

                        <div class="md-3 row">
                          <label class="form-label text-lg">Cambia tu <span class="btn-label"><img src="{{ asset("RoomGame.svg") }}" width="20" height="20" class="ms-2" /></span>
                            <strong class="text-success">RG PASS</strong>
                          </label>
                          <input type="number" class="col mx-2 form-control form-control-lg text-center fw-bold" id="n1" name="n1" min="0" max="9" maxlength="1" maxlength="1" pattern="[0-9]+"  title="Formato: 1 digito" required>
                          <input type="number" class="col mx-2 form-control form-control-lg text-center fw-bold" id="n2" name="n2" min="0" max="9" maxlength="1" pattern="[0-9]+"  title="Formato: 1 digito" required>
                          <input type="number" class="col mx-2 form-control form-control-lg text-center fw-bold" id="n3" name="n3" min="0" max="9" maxlength="1" pattern="[0-9]+"  title="Formato: 1 digito" required>
                          <input type="number" class="col mx-2 form-control form-control-lg text-center fw-bold" id="n4" name="n4" min="0" max="9" maxlength="1" pattern="[0-9]+"  title="Formato: 1 digito" required>
                        </div>

                        <label class="form-label text-lg mt-2">Selecciona tu avatar favorito</label>
                        <div class="container parent table-wrapper-scroll-y my-custom-scrollbar-img">
                          <div class="row">
                            @for ($i = 1; $i < 24; $i++)
                              <div class="col col-4 col-sm-4 col-md-4 col-lg-3 text-center">
                                <input type="radio" name="imagen" id="img{{ $i }}" onclick="selectedImg()" class="d-none imgbgchk" value="{{ $i }}" {{ $i==1 ? 'required' : '' }} {{ $user_room->config['img'] == $i ? 'checked' : '' }}>
                                <label for="img{{ $i }}">
                                  <img src="{{ asset('assets/game/personajes/'.$i.".png") }}" class="rounded-2" alt="Image {{ $i }}">
                                  <div class="tick_container">
                                    <div class="tick"><i class="fa fa-check"></i></div>
                                  </div>
                                </label>
                              </div>
                            @endfor
                          </div>
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
                @endif

              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  @if ($isMobile)
  <ul class="navbar nav nav-pills nav-justified navbar_down navbar-light bg-light d-sm-block d-md-none" id="pills-tab" role="tablist">
    <li class="nav-item px-2" role="presentation">
      <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
        <i class=" bi bi-wallet2"></i>
        <span class="small d-block">Historial</span>
      </button>
    </li>
    <li class="nav-item px-2" role="presentation">
      <button class="nav-link" id="pills-transfer-tab" data-bs-toggle="pill" data-bs-target="#pills-transfer" type="button" role="tab" aria-controls="pills-transfer" aria-selected="false">
        <i class="bi bi-credit-card"></i>
        <span class="small d-block">Depositar</span>
      </button>
    </li>
    <li class="nav-item px-2" role="presentation">
      <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
        <i class=" bi bi-person-circle"></i>
        <span class="small d-block">Perfil</span>
      </button>
    </li>
  </ul>
  @endif


<!-- Modal -->
<div class="modal fade" id="transferModal" tabindex="-1" aria-labelledby="transferModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="transferModalLabel">¿Cuánto transferirás?</h5>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form class="form-submit" action="{{ route('game.bank.transfer',$r->id) }}" method="POST">
          @csrf

          <input type="hidden" name="contact_id" id="modal-contact">
          <input type="hidden" name="type" value="{{ $isBanker ? 'BANK' : 'USER' }}">


          <div class="mb-3">
            <label class="form-label text-lg">Ingrese un monto</label>
            <input class="form-control form-control-lg" type="number" id="money" name="money" placeholder="Ej: $1.000" min="1" pattern="[0-9]+" required>
          </div>

          <div class="mb-3">
            <label class="form-label text-lg">Comentario</label>
            <input class="form-control form-control-lg" type="text" id="comment" name="comment">
          </div>

          @if (!$isBanker)
          <div class="mb-3 row">
            <label class="form-label text-lg">
              Ingresa su <span class="btn-label"><img src="{{ asset("RoomGame.svg") }}" width="20" height="20" class="ms-2" /></span>
              <strong class="text-success">RG PASS</strong>
            </label>
            <input type="number" class="col mx-2 form-control form-control-lg text-center fw-bold" id="n1" name="n1" min="0" max="9" maxlength="1" maxlength="1" pattern="[0-9]+"  title="Formato: 1 digito" required>
            <input type="number" class="col mx-2 form-control form-control-lg text-center fw-bold" id="n2" name="n2" min="0" max="9" maxlength="1" pattern="[0-9]+"  title="Formato: 1 digito" required>
            <input type="number" class="col mx-2 form-control form-control-lg text-center fw-bold" id="n3" name="n3" min="0" max="9" maxlength="1" pattern="[0-9]+"  title="Formato: 1 digito" required>
            <input type="number" class="col mx-2 form-control form-control-lg text-center fw-bold" id="n4" name="n4" min="0" max="9" maxlength="1" pattern="[0-9]+"  title="Formato: 1 digito" required>
          </div>
          @endif

          <div class="d-grid gap-2">
            <button type="submit" id="btn-transfer" disabled class="btn btn-lg btn-primary p-3"><strong>DEPOSITAR</strong></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@push("javascript")

<script>

  $("#money").keyup(function() { validateForm(); });
  $("#n1").keyup(function() { validateForm(); $("#n2").focus(); });
  $("#n2").keyup(function() { validateForm(); $("#n3").focus(); });
  $("#n3").keyup(function() { validateForm(); $("#n4").focus(); });
  $("#n4").keyup(function() { validateForm(); });

  function validateForm() {
    if ($("#money").val() && $("#n1").val() && $("#n2").val() && $("#n3").val() && $("#n4").val()) {
      $("#btn-transfer").removeAttr("disabled");
    } else {
      $("#btn-transfer").attr("disabled", true);
    }
  }

  const modalTransfer = document.getElementById('transferModal');
  modalTransfer.addEventListener('show.bs.modal', event => {
    var reference_tag = $(event.relatedTarget);

    let contact = reference_tag.data('contact');

    $("#modal-contact").val(contact);
  });


  let selectImg = false;

  $("#nickname").keyup(function() { validateForm(); });
  // $("#n1").keyup(function() { console.log(this); };
  $("#n1").keyup(function() { validateForm(); $("#n2").focus(); });
  $("#n2").keyup(function() { validateForm(); $("#n3").focus(); });
  $("#n3").keyup(function() { validateForm(); $("#n4").focus(); });
  $("#n4").keyup(function() { validateForm(); });

  function selectedImg() {
    selectImg = true;
    validateForm();
  }

  function validateForm() {
    if ($("#nickname").val() && $("#n1").val() && $("#n2").val() && $("#n3").val() && $("#n4").val() && selectImg) {
      $("#btn-play").removeAttr("disabled");
    } else {
      $("#btn-play").attr("disabled", true);
    }
  }


</script>

@endpush
