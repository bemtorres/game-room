@extends('layouts.app')
@push('stylesheet')
<link rel="stylesheet" href="{{ asset('vendor/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endpush
@section('content')
<main class="content">
  <div class="container-fluid p-0">
    @include('user._tabs_show')
    <div class="row">
      <div class="col-12 col-lg-4 col-xxl-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">HISTORIAL DE MOVIMIENTO</h5>
            {{-- <p class="card-text">Content</p> --}}
            <p>
              SALDO ACTUAL
              <span class="fs-4 ms-2">
                  <span class="btn-label"><img src="{{ asset('RoomGame.svg') }}" width="20" height="20" class="ms-2" /></span>
                  {{ $u->getCredit() }}
              </span>
            </p>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h5 class="card-title mb-0">Cargar creditos</h5>
          </div>
          <form class="form-submit" action="{{ route('user.credit',$u->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group row mb-3">
                    <label for="inputNombre" class="col-sm-4 col-form-label">Motivo</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputNombre" name="name" value="" placeholder="motivo de la carga" required>
                    </div>
                  </div>
                  <div class="form-group row mb-3">
                    <label for="inputCorreo" class="col-sm-4 col-form-label">Monto</label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" id="inputNombre" name="credit" value="" placeholder="" required>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-primary" type="submit">Guardar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
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
    $("#tableCredit").DataTable();
  });
</script>
@endpush
