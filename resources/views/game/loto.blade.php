@extends('layouts.skeleton')
@push('stylesheet')

<style>
  .items-green {
    background-color: #A2E49B;
  }

  .letra-green {
    color:   #3CC810;
  }

  .items-click:hover{
  outline: 2px solid #333;
  text-shadow: -1px 0 black, 0 .5px black, .5px 0 black, 0 -.5px black;
  /* color: #fff; */
  cursor: pointer;
  background-color: rgba(206, 206, 206, 0.367);
  transition: background .7s;
}

<style>
  /* Círculos de colores numerados */
span.red {
  background: red;
   border-radius: 0.8em;
  -moz-border-radius: 0.8em;
  -webkit-border-radius: 0.8em;
  color: #ffffff;
  display: inline-block;
  font-weight: bold;
  line-height: 1.6em;
  margin-right: 15px;
  text-align: center;
  width: 1.6em;
}

span.dark {
  background: black;
   border-radius: 0.8em;
  -moz-border-radius: 0.8em;
  -webkit-border-radius: 0.8em;
  color: #ffffff;
  display: inline-block;
  font-weight: bold;
  line-height: 1.6em;
  margin-right: 15px;
  text-align: center;
  width: 1.6em;
}

span.grey {
  background: #cccccc;
  border-radius: 0.8em;
  -moz-border-radius: 0.8em;
  -webkit-border-radius: 0.8em;
  color: #fff;
  display: inline-block;
  font-weight: bold;
  line-height: 1.6em;
  margin-right: 15px;
  text-align: center;
  width: 1.6em;
}

span.green {
  background: #5EA226;
  border-radius: 0.8em;
  -moz-border-radius: 0.8em;
  -webkit-border-radius: 0.8em;
  color: #ffffff;
  display: inline-block;
  font-weight: bold;
  line-height: 1.6em;
  margin-right: 15px;
  text-align: center;
  width: 1.6em;
}

span.blue {
  background: #5178D0;
  border-radius: 0.8em;
  -moz-border-radius: 0.8em;
  -webkit-border-radius: 0.8em;
  color: #ffffff;
  display: inline-block;
  font-weight: bold;
  line-height: 1.6em;
  margin-right: 15px;
  text-align: center;
  width: 1.6em;
}

</style>
</style>

@endpush
@section('app')
<div class="wrapper">
  @include('layouts._header')
  <div class="main">
    @include('layouts._nav')
    <main class="content">
      <div class="container-fluid">
        <h1 class="h3 mb-3">
          <a href="{{ route('home') }}" class="text-dark"><i class="fa fa-arrow-circle-left"></i></a>
          <strong>{{ $user_room->room->name }}</strong>
        </h1>

        @if (!empty($claim) && $user_room->room->status <= 2)
        <div class="alert alert-primary" role="alert">
          <h4 class="alert-heading">
            {{-- <a href="{{ route('home') }}" class="text-dark"><i class="fa fa-arrow-circle-left"></i></a> --}}
            <strong>FELICIDADES ESTAMOS CHEQUEANDO TU CARTÓN</strong>
          </h4>
        </div>
        @endif
        @if ($user_room->room->status == 3)

        <div class="row">
          <div class="col-xl-6 col-xxl-5 d-flex">
            <div class="w-100">
              <div class="row">
                <div class="col-sm-12">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col mt-0">
                          <h5 class="card-title">Mis números <strong>ID CARTÓN #{{ $user_room->loto_id }}</strong></h5>
                        </div>
                        {{-- <div class="col-auto">
                          <div class="stat text-primary">
                            <i class="fa fa-home"></i>
                          </div>
                        </div> --}}
                      </div>
                      <div class="d-flex justify-content-center">
                        @php
                          $count = 0;
                        @endphp
                        @foreach ($user_room->loto->getCode() as $kC => $vC)
                          @php
                            $selected = false;
                            if ($numbers_selected) {
                              foreach ($numbers_selected as $kN => $vN) {
                                if ($vC == $vN) {
                                  $selected = true;
                                  $count++;
                                  break;
                                }
                              }
                            }
                          @endphp
                          <h6>
                            <span class="{{ $selected ? 'green' : 'dark' }}">
                              {{ $vC }}
                            </span>
                          </h6>
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col mt-0">
                          <h5 class="card-title">Seleccionados / Anunciados</h5>
                        </div>

                        <div class="col-auto">
                          <div class="stat text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users align-middle"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                          </div>
                        </div>
                      </div>
                      <h1 class="mt-1 mb-3">
                        <strong>{{ $count }} / 15</strong>
                      </h1>
                      {{-- <div class="mb-0">
                        <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 5.25% </span>
                        <span class="text-muted">Since last week</span>
                      </div> --}}
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col mt-0">
                          <h5 class="card-title">Porcentaje de acierto</h5>
                        </div>
                        <div class="col-auto">
                          <div class="stat text-primary">
                            <i class="fa fa-percentage"></i>
                          </div>
                        </div>
                      </div>
                      <h1 class="mt-1 mb-3">
                        @if ($count > 0)
                          {{ round(( $count / 15 ) * 100, 1) }}
                        @else
                          0
                        @endif
                        %
                      </h1>
                    </div>
                  </div>
                </div>
                @if (!empty($claim))
                <div class="col-sm-12">
                  <div class="card">
                    <div class="card-body">
                      <h3 class="mt-1 mb-3">
                        @if ($claim->position && $claim->status == 2)
                        <i class="{{ $claim->getPlace() }}"></i>
                        @switch($claim->position)
                          @case(1)
                            Felicidades has ganado el 1° Lugar
                            @break
                          @case(2)
                            Felicidades has ganado el 2° Lugar
                            @break
                          @case(3)
                            Felicidades has ganado el 3° Lugar
                            @break
                          @default
                            Felicidades estas dentro de los ganadores
                        @endswitch
                        @else
                        <i class="fa fa-medal text-dark"></i>
                        Has reclamado tu premio...
                        @endif
                      </h3>
                    </div>
                  </div>
                </div>
                @endif
                @if (count($claimers)>0)
                <div class="col-sm-12">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Tabla de ganadores</h5>
                      {{-- <p class="card-text">Content</p> --}}
                      <table class="table table-hover my-0">
                        <thead>
                          <tr>
                            <th>LUGAR</th>
                            <th>NOMBRE</th>
                            <th>CARTÓN</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($claimers as $c)
                          <tr>
                            <td>
                              <i class="{{ $c->getPlace() }}"></i> {{ $c->position }}° LUGAR
                            </td>
                            <td>{{ $c->usuario_claim->name }}</td>
                            <td># {{ $c->loto_id }}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                @endif

              </div>
            </div>
          </div>

          <div class="col-xl-6 col-xxl-7">
            <div class="card">
              <div class="card-header">

                <h5 class="card-title mb-0">Números enuciados <strong>{{ $user_room->room->name }}</strong></h5>
              </div>
              <div class="card-body">
                <table class="table table-sm text-center">
                  <tbody>
                    @for ($f=1; $f <= 10; $f++)
                    <tr>
                      @for ($c=1; $c <= 9; $c++)
                      @php
                        $n = $f;
                        if ($c > 1) {
                          $n += ($c-1) * 10;
                        }
                        $color = "grey";
                        if ($numbers_selected) {
                          foreach ($numbers_selected as $kN => $vN) {
                            if ($n == $vN) {
                              $color = "green";
                              break;
                            }
                          }
                        }
                      @endphp
                      <td>
                        <h4>
                          <span class="{{ $color }}">{{ $n }}</span>
                        </h4>
                      </td>
                      @endfor
                    </tr>
                    @endfor
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        @else
        <div class="row">
          <div class="col-md-12">
            <div class="card flex-fill">
              <div class="card-header">
                <div class="row">
                  <div class="col-md-4">
                    <input id="colorpicker" type="color" class="form-control" name="config_color" onkeyup="changeColor" />
                  </div>
                  <div class="col-md-4">
                    <div class="d-grid gap-2">
                      <button class="btn btn-warning" id="btnWin" hidden type="button" data-bs-toggle="modal" data-bs-target="#winModal">
                        <strong><i class="fa fa-trophy"></i> RECLAMAR PREMIO</strong>
                      </button>
                    </div>
                  </div>
                  <div class="col-md-4"></div>
                </div>
                {{-- <h5 class="card-title">Latest Projects</h5> --}}
              </div>
              <div class="table-responsive">
                <table class="table table-bordered" border="2">
                  <tbody>
                    @php
                      $position_id = 0;
                    @endphp
                    @foreach ($user_room->loto->getBoleto() as $key => $value)
                    <tr class="align-items-center">
                      @for ($n=0; $n < 9; $n++)
                      <td id="item-check-{{ $position_id }}" data-id="item-check-{{ $position_id++ }}" data-check="false" class="text-center align-middle {{ $value[$n] == 0 ? 'items-green' : 'items-click ' }}" style="width: 11.1111%;">
                        <h2 class="circulo">
                          <strong class="">
                            {{ $value[$n] != 0 ? $value[$n] : '' }}
                          </strong>
                        </h2>
                      </td>
                      @endfor
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        @endif

      </div>
    </main>
    @include('layouts._footer')
  </div>
</div>

@if ($user_room->room->status <= 2)
<div class="modal fade" id="winModal" tabindex="-1" aria-labelledby="winModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <div class="card-body">
          <div class="d-flex justify-content-center bg-warning rounded mb-2">
            <h3 class="py-2">¡¡¡FELICIDADES!!!</h3>
          </div>
          <img src="https://i.giphy.com/media/fxsqOYnIMEefC/source.gif" width="100%" alt="">
          <form class="form-submit" action="{{ route('game.claim',[$user_room->room_id,$user_room->loto_id]) }}" method="post">
            @csrf
            <input type="hidden" name="room_id" value="{{ $user_room->room_id }}">
            <input type="hidden" name="ticket" value="{{ $user_room->id }}">
            <div class="d-grid gap-2 pt-2">
              <button type="submit" class="btn btn-warning btn-lg">
                <i class="fa fa-trophy"></i>
                RECLAMAR PREMIO
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endif
@endsection
@push('javascript')
@if ($user_room->room->status <= 2)
<script>
  const KEY_NAME = "item-room-{{ $user_room->id }}";
  let contador_game = 0;
  $(function () {

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
        saveStorageColor(tinycolor.toHexString());
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
          saveStorageColor(tinycolor.toHexString());
        },
      });
    }

    if(localStorage.getItem(KEY_NAME)) {
      var ids = JSON.parse(localStorage.getItem(KEY_NAME));
      ids.forEach(id_i => {
        $("#" + id_i).css("background-color","rgba(51, 51, 51, 0.367)");
        $("#" + id_i).data("check",true);
        contador_game++;
      });
    }

    function saveStorageColor(color) {
      localStorage.setItem('bgcolor',color);
    }

    function saveStorageItem(id) {
      if (localStorage.getItem(KEY_NAME)) {
        var ids = JSON.parse(localStorage.getItem(KEY_NAME));
        var is_find = false;
        ids.forEach(id_i => {
          if (id_i == id ) {
            is_find = true;
          }
        });

        if (!is_find) {
          ids = [...ids, id];
          localStorage.setItem(KEY_NAME,JSON.stringify(ids));
        }
      } else {
        var ids = [id];
        localStorage.setItem(KEY_NAME,JSON.stringify(ids));
      }
    }

    function removeStorageItem(id) {
      var ids = JSON.parse(localStorage.getItem(KEY_NAME));
      for( var i = 0; i < ids.length; i++){
        if ( ids[i] === id) {
          ids.splice(i, 1);
        }
      }
      localStorage.setItem(KEY_NAME,JSON.stringify(ids));
    }

    function ver() {
      var ids = JSON.parse(localStorage.getItem(KEY_NAME));
    }

    if (contador_game==15) {
      $('#btnWin').removeAttr('hidden');
    }

    var items_selected = [];
    $(".items-click").click(function() {
      var status = $(this).data("check");
      var id = $(this).data("id");

      $(this).data("check",!status);
      $(this).css("background-color","rgba(51, 51, 51, 0.367)");
      if (status) { $(this).css("background-color",""); }
      if(status) {
        contador_game--;
        removeStorageItem(id);
        ver();
      } else {
        contador_game++;
        saveStorageItem(id);
        ver();
      }
      if (contador_game == 15) {
        $('#winModal').modal('show');
        $('#btnWin').removeAttr('hidden');
      } else {
        $('#btnWin').attr('hidden');
      }
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
@endif
@endpush
