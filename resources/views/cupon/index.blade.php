@extends('layouts.app')
@push('stylesheet')
<link rel="stylesheet" href="{{ asset('vendor/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endpush
@section('content')
<main class="content">
  <div class="container-fluid p-0">

    <h1 class="h3 mb-3"><strong>Cupones</strong></h1>
    @include('cupon._tabs')

    <div class="row">
      <div class="col-12 col-lg-12 col-xxl-12 d-flex">
        <div class="card flex-fill">
          <div class="card-body">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Código</th>
                  <th>Password</th>
                  <th>Usuarios</th>
                  <th>
                    <img src="{{ asset('RoomGame.svg') }}" width="20" height="20" class="ms-2" />
                    Credito
                  </th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($cupones as $c)
                <tr>
                  <th>{{ $c->id }}</th>
                  <td>
                    <a href="{{ route('cupons.edit',$c->id) }}">
                      {{ $c->name }}
                    </a>
                  </td>
                  <td>{{ $c->code }}</td>
                  <td>{{ $c->password }}</td>
                  <td>
                    <i class="fa fa-users"></i> {{ $c->cont_users }}
                  </td>
                  <td>
                    <img src="{{ asset('RoomGame.svg') }}" width="20" height="20" class="ms-2" />
                    {{ $c->getPrice() }}
                  </td>
                  <td>
                    <span type="button" class="badge bg-{{ $c->active ? 'success' : 'danger' }}" data-bs-toggle="modal" data-bs-target="#newModal" data-id="{{ $c->id }}">
                      {{ $c->active ? 'Activo' : 'Desactivado' }}
                    </span>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      {{-- <div class="col-12 col-lg-4 col-xxl-3 d-flex">
        <div class="card flex-fill w-100">
          <div class="card-header">

            <h5 class="card-title mb-0">Monthly Sales</h5>
          </div>
          <div class="card-body d-flex w-100">
            <div class="align-self-center chart chart-lg">
              <canvas id="chartjs-dashboard-bar"></canvas>
            </div>
          </div>
        </div>
      </div> --}}
    </div>
  </div>
</main>

<div class="modal fade" id="newModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Activar o Desactivar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form class="form-submit" action="{{ route('cupon.active') }}" method="post">
          @csrf
          @method('PUT')
          <input type="hidden" name="id" id="option_id">
          <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
@push('javascript')
<script src="{{ asset('vendor/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('vendor/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('vendor/dinobox/datatables-es.js') }}"></script>
<script>
  $(function () {
    $("#tablaTiendas").DataTable();

    $('#newModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var id = button.data('id');
      var modal = $(this);
      modal.find('#option_id').val(id);
    });
  });
</script>
@endpush
