@extends('layouts.app')
@push('stylesheet')
<link rel="stylesheet" href="{{ asset('vendor/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endpush
@section('content')
<main class="content">
  <div class="container-fluid p-0">
    @include('user._tabs')
    <div class="row">
      <div class="col-12 col-lg-12 col-xxl-12 d-flex">
        <div class="card flex-fill">
          {{-- <div class="card-header"> --}}
            {{-- <h5 class="card-title mb-0">Latest Projects</h5> --}}
          {{-- </div> --}}
          <div class="card-body">
            <table id="tablaUsers" class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Correo</th>
                  {{-- <th>Usuarios</th> --}}
                  <th><img src="{{ asset('RoomGame.svg') }}" width="20" height="20" class="ms-2" />Credito</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($usuarios as $u)
                <tr>
                  <th>{{ $u->id }}</th>
                  <td>
                    <a href="{{ route('usuarios.show',$u->id) }}">
                      {{ $u->name }}
                    </a>
                  </td>
                  <td>{{ $u->email }}</td>
                  <td><img src="{{ asset('RoomGame.svg') }}" width="20" height="20" class="ms-2" /> {{ $u->getCredit() }}</td>
                  {{-- <td>
                    <span type="button" class="badge bg-{{ $c->active ? 'success' : 'danger' }}" data-bs-toggle="modal" data-bs-target="#newModal" data-id="{{ $c->id }}">
                      {{ $c->active ? 'Activo' : 'Desactivado' }}
                    </span>
                  </td> --}}
                </tr>
                @endforeach
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
<script src="{{ asset('vendor/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('vendor/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('vendor/dinobox/datatables-es.js') }}"></script>
<script>
  $(function () {
    $("#tablaUsers").DataTable();
  });
</script>
@endpush
