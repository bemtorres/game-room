@extends('layouts.app')
@push('stylesheet')
<link rel="stylesheet" href="{{ asset('vendor/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endpush
@section('content')
<main class="content">
  <div class="container-fluid p-0">
    @include('user._tabs')
    <div class="row">
      <div class="col-12 col-lg-8 col-xxl-9 d-flex">
        <div class="card flex-fill">
          {{-- <div class="card-header"> --}}
            {{-- <h5 class="card-title mb-0">Latest Projects</h5> --}}
          {{-- </div> --}}
          <div class="card-body">
            <table id="tablaUsers" class="table table-hover">
              <thead>
                <tr>
                  <th>Correo</th>
                  <th>Nombre</th>
                  <th>Creditos</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($array_users as $ku => $vu)
                <tr>
                  <td>
                    {{ $vu['email'] }}
                  </td>
                  <td>
                    {{ $vu['name'] }}
                  </td>
                  {{-- <td>{{ $c->password }}</td> --}}
                  {{-- <td>
                    <i class="fa fa-users"></i> {{ $c->cont_users }}
                  </td> --}}
                  <td>$ {{ $vu['credit'] }}</td>
                  <td>
                    @if ($vu['status']['new'])
                      <span class="badge bg-success">Nuevo</span>
                    @else
                      <span class="badge bg-danger">Error</span>
                    @endif
                  </td>
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