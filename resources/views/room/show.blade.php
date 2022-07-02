@extends('layouts.app')
@push('stylesheet')
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

span.pink {
  background: #EF0BD8;
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
@endpush
@section('content')
<main class="content">
  <div class="container-fluid p-0">
    @include('room._tabs_show')

    {{-- <h1><span class="grey">1</span></h1>
    <h1><span class="red">2</span></h1>
    <h1><span class="blue">3</span></h1>
    <h1><span class="green">4</span></h1>
    <h1><span class="pink">5</span></h1> --}}

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
                <span class="btn-label"><i class="fab fa-gg-circle text-warning"></i></span>
                  <strong>{{  $r->getPrice() }}</strong>
              </span>
            </p>
          </div>
        </div>

        <div class="card">
          <div class="card-header">
            <h5 class="card-title mb-0">Anunciar número</h5>
          </div>
          <form class="form-submit" action="{{ route('room.number', $r->id) }}" method="post">
            @csrf
            <div class="card-body">
              <div class="form-group row mb-3">
                <label for="inputNumber" class="col-sm-12 col-form-label">
                  <strong>Número Seleccionado</strong>
                </label>
                <div class="col-sm-12">
                  <input type="number" min="1" maxlength="90" max="90" autofocus class="form-control form-control-lg" id="inputNumber" name="number" placeholder="" required>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success">
                  <strong>ENVIAR</strong>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-9">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title mb-0">TABLA DE NÚMEROS</h5>
          </div>
          <div class="card-body">
            <table class="table table-sm table-light text-center">
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
  </div>
</main>
@endsection
@push('javascript')
<script>
  $( "#inputNumber" ).focus();
</script>
@endpush