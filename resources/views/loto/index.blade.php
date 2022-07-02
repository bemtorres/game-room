@extends('layouts.app')
@push('stylesheet')
<link rel="stylesheet" href="{{ asset('vendor/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endpush
@section('content')
<main class="content">
  <div class="container-fluid p-0">

    <h1 class="h4 mb-3">
      <strong>CARTONES DE LOTO</strong>
    </h1>
    <p>
      SALDO ACTUAL
      <span class="fs-4 ms-2">
          <span class="btn-label"><i class="fab fa-gg-circle text-warning"></i></span>
          {{ current_user()->getCredit() }}
      </span>
    </p>

    {{-- @include('me._tabs') --}}
    <div class="row">
      <div class="col-12 col-lg-4 col-xxl-3">
        <div class="card">
          <div class="card-header">

            <h5 class="card-title mb-0">Búsca tu cartón [ 1 - {{ $total }}]</h5>
          </div>
          <form class="form-submit" action="{{ route('loto.find') }}" method="post">
            @csrf
            <div class="card-body">
              <div class="form-group row mb-3">
                <label for="inputCode" class="col-sm-4 col-form-label">ID</label>
                <div class="col-sm-12">
                  <input type="number" min="1" class="form-control" id="inputCode" name="id" placeholder="Código de cartón" required>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button class="btn btn-success btn-sm button-prevent"><strong>Buscar</strong></button>
            </div>
          </form>
        </div>
      </div>
      @if (!empty($l))
      <div class="col-12 col-lg-8 col-xxl-9 d-flex">
        <div class="card flex-fill">
          <div class="card-header">
            <h5 class="card-title mb-0">Cartón {{ $l->id }}</h5>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" border="2">
                <tbody>
                  @foreach ($l->numbers as $key => $value)
                  <tr class="align-items-center">
                    @for ($n=0; $n < 9; $n++)
                    <td id="modulo" data-check="false" class="text-center align-middle {{ $value[$n] == 0 ? 'bg-warning' : 'items-click ' }}" style="width: 11.1111%;">
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
  </div>
</main>

@endsection
@push('javascript')
<script src="{{ asset('vendor/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('vendor/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('vendor/dinobox/datatables-es.js') }}"></script>
<script>
  $(function () {
    $("#tablaTiendas").DataTable();
  });
</script>
@endpush