@extends('layouts.app')
@push('stylesheet')
<link rel="stylesheet" href="{{ asset('vendor/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endpush
@section('content')
<main class="content">
  <div class="container-fluid p-0">

    <h1 class="h4 mb-3">
      <strong>HISTORIAL DE MOVIMIENTO</strong>
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
        <div class="card flex-fill w-100">
          <div class="card-header">

            <h5 class="card-title mb-0">Canjear cupón</h5>
          </div>
          <form class="form-submit" action="{{ route('canjear') }}" method="post">
            @csrf
            <div class="card-body">
              <div class="form-group row mb-3">
                {{-- <label for="inputNombre" class="col-sm-4 col-form-label">Nombre</label> --}}
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="inputCode" name="code" placeholder="Código de cupón" required>
                </div>
              </div>
              <div class="form-group row mb-3">
                {{-- <label for="inputNombre" class="col-sm-4 col-form-label">Nombre</label> --}}
                <div class="col-sm-12">
                  <input type="password" class="form-control" id="inputPassword" name="password" placeholder="****">
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button class="btn btn-success btn-sm button-prevent"><strong>Enviar</strong></button>
            </div>
          </form>
        </div>
      </div>
      @php
        $u = current_user();
      @endphp
      @include('me._cuenta')
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