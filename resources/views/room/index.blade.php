@extends('layouts.app')
@push('stylesheet')
<link rel="stylesheet" href="{{ asset('vendor/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endpush
@section('content')
<main class="content">
  <div class="container-fluid p-0">
    @include('room._tabs')
    <div class="row">
      <div class="col-12 col-lg-8 col-xxl-9 d-flex">
        <div class="card flex-fill">
          <div class="card-header">
            {{-- <h5 class="card-title mb-0">Latest Projects</h5> --}}
          </div>
          <div class="card-body">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Password</th>
                  <th>Usuarios</th>
                  <th><img src="{{ asset('RoomGame.svg') }}" width="20" height="20" class="ms-2" />Credito</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($rooms as $r)
                <tr>
                  <th>{{ $r->id }}</th>
                  <td>
                    <a href="{{ route('rooms.show',$r->id) }}">
                      {{ $r->name }}
                    </a>
                  </td>
                  <td>{{ $r->password }}</td>
                  <td>
                    <i class="fa fa-users"></i> {{ $r->cont_users }}
                  </td>
                  <td>$ {{ $r->getPrice() }}</td>
                  <td>
                    <span class="badge bg-{{ $r->getStatus()[2] }}">
                      <i class="{{ $r->getStatus()[1] }}"></i>
                      {{ $r->getStatus()[0] }}
                    </span>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-4 col-xxl-3 d-flex">
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
    $("#tablaTiendas").DataTable();
  });
</script>
@endpush
