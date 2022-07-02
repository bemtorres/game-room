@extends('layouts.app')
@push('stylesheet')
<link rel="stylesheet" href="{{ asset('vendor/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endpush
@section('content')
<main class="content">
  <div class="container-fluid p-0">
    <h1 class="h4 mb-3">
      <i class="fa fa-trophy text-warning"></i>
      <strong>MIS TROFEOS</strong>
    </h1>
    <div class="row">
      @php
        $u = current_user();
      @endphp
      @include('me._trofeos')
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