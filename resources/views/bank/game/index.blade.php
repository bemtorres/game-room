@extends("layouts.skeleton")
@push("stylesheet")

<style>
    body {
      background: #d9dbe0 !important;
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
      <div class="row vh-100">
        <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
          <div class="d-table-cell align-middle">

            <div class="text-center mt-4">
              <h1 class="h2">Welcome al banco {{ $r->name }}</h1>
              <p class="lead">
              Inicia sesión con tu cuenta
              </p>
            </div>

            <div class="card">
              <div class="card-body">
                <div class="text-center">
                  <img src="{{ asset($r->getPhoto()) }}" alt="" class="img-fluid rounded-circle" width="132" height="132">
                </div>
                <form class="form-submit" action="{{ route('game.bank.enrollment',$r->id) }}" method="POST">
                  @csrf
                  <div class="mb-3">
                    <label class="form-label text-lg">¿Como quieres que te llamemos?</label>
                    <input class="form-control form-control-lg" type="text" id="nickname" name="nickname" value="{{ current_user()->name }}" required>
                  </div>

                  <div class="md-3 row">
                    <label class="form-label text-lg">Ingresa su <span class="btn-label"><img src="{{ asset("RoomGame.svg") }}" width="20" height="20" class="ms-2" /></span>
                      <strong class="text-success">RG PASS</strong>
                    </label>
                    <input type="number" class="col mx-2 form-control form-control-lg text-center fw-bold" id="n1" name="n1" min="0" max="9" maxlength="1" maxlength="1" pattern="[0-9]+"  title="Formato: 1 digito" required>
                    <input type="number" class="col mx-2 form-control form-control-lg text-center fw-bold" id="n2" name="n2" min="0" max="9" maxlength="1" pattern="[0-9]+"  title="Formato: 1 digito" required>
                    <input type="number" class="col mx-2 form-control form-control-lg text-center fw-bold" id="n3" name="n3" min="0" max="9" maxlength="1" pattern="[0-9]+"  title="Formato: 1 digito" required>
                    <input type="number" class="col mx-2 form-control form-control-lg text-center fw-bold" id="n4" name="n4" min="0" max="9" maxlength="1" pattern="[0-9]+"  title="Formato: 1 digito" required>
                  </div>

                  <label class="form-label text-lg mt-2">Selecciona tu avatar favorito</label>
                  <div class="container parent">
                    <div class="row">
                      @for ($i = 1; $i < 24; $i++)
                        <div class="col col-4 col-sm-4 col-md-4 col-lg-3 text-center">
                          <input type="radio" name="imagen" id="img{{ $i }}" onclick="selectedImg()" class="d-none imgbgchk" value="{{ $i }}" {{ $i==1 ? 'required' : '' }}>
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
                    <button type="submit" id="btn-play" disabled class="btn btn-lg btn-primary p-3"><strong>JUGAR</strong></button>
                  </div>
                </form>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
@push("javascript")

<script>

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
