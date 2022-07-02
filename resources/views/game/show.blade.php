@extends('layouts.app')
@push('stylesheet')
@endpush
@section('content')
<main class="content">
  <div class="container-fluid p-0">
    <div class="alert alert-primary" role="alert">
      <h4 class="alert-heading">
        <a href="{{ route('home') }}" class="text-dark"><i class="fa fa-arrow-circle-left"></i></a>
        <strong>SELECCIONA TU CARTÓN ANTES SE AGOTEN</strong>
      </h4>
    </div>
    {{-- @include('me._tabs') --}}
    <div class="row">
      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            {{-- <h5 class="card-title">Title</h5> --}}
            {{-- <p class="card-text">Content</p> --}}
            <p class="card-text">
              PRECIO CARTÓN
              <br>
              <span class="fs-4 ms-2">
                <span class="btn-label">
                    <img src="{{ asset('RoomGame.svg') }}" width="20" height="20" class="ms-2" />
                </span>
                  <strong>{{  $r->getPrice() }}</strong>
              </span>
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12 col-lg-4 col-xxl-3">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title mb-0">Búsca tu cartón [ 1 - {{ $total }}]</h5>
          </div>
          <form class="form-submit" action="{{ route('game.enrollment', $r->id) }}" method="post">
            @csrf
            <div class="card-body">
              {{-- <div class="form-group row mb-3">
                <label for="inputCode" class="col-sm-4 col-form-label">PASSWORD</label>
                <div class="col-sm-12">
                  <input type="number" min="1" class="form-control" id="inputCode" name="number" placeholder="Código de cartón" required>
                </div>
              </div> --}}
              <div class="form-group row mb-3">
                <label for="inputCode" class="col-sm-4 col-form-label">
                  <strong>CARTÓN</strong>
                </label>
                <div class="col-sm-12">
                  <input type="number" min="1" class="form-control" id="inputCode" name="number" placeholder="Código de cartón" required>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="d-grid gap-2">
                <button class="btn btn-success">
                  <strong>Comprar</strong>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>



@endsection
@push('javascript')
<script>

  $(function () {
    var text_few = document.getElementById('text-few');
    var winModal = new bootstrap.Modal(document.getElementById('winModal'), {
      keyboard: false
    });


    function changeColor(color){
      const demoClasses = document.querySelectorAll('.items-green');
      demoClasses.forEach(element => {
        element.style.backgroundColor = color;
      });
    }

    $("#colorpicker").spectrum({
      color: currentColor,
      type: "color",
      togglePaletteOnly: true,
      showInput: true,
      showInitial: true,
      showButtons: false,
      move: function(tinycolor) {
        changeColor(tinycolor.toHexString());
        saveStorage(tinycolor.toHexString());
      },
    });


    if(!localStorage.getItem('bgcolor')) {
      changeColor("#A2E49B");
    } else {
      var currentColor = localStorage.getItem('bgcolor');
      changeColor(currentColor);

      $("#colorpicker").spectrum({
        color: currentColor,
        type: "color",
        togglePaletteOnly: true,
        showInput: true,
        showInitial: true,
        showButtons: false,
        move: function(tinycolor) {
          changeColor(tinycolor.toHexString());
          saveStorage(tinycolor.toHexString());
        },
      });
    }

    function saveStorage(color) {
      localStorage.setItem('bgcolor',color);
    }

    let contador_game = 0;
    $( ".items-click" ).click(function() {
      var status = $(this).data("check");
      $(this).data("check",!status);
      $(this).css("background-color","rgba(51, 51, 51, 0.367)");
      if (status) { $(this).css("background-color",""); }
      if(status) { contador_game--; } else { contador_game++; }
      if (contador_game == 15) {
        winModal.toggle();
      }
      $("#text-few").html(contador_game);
    });

  });

  //
  //  ----------------------------
  //
  //      || |||| ||||| |||| |
  //      || |||| ||||| |||| |
  //      ||    BEMTORRES    |
  //      || |||| ||||| |||| |
  //      || |||| ||||| |||| |
  //
  //  ----------------------------


</script>
@endpush
