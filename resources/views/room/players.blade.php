@extends('layouts.app')
@push('stylesheet')

@endpush
@section('content')
<main class="content">
  <div class="container-fluid p-0">
    @include('room._tabs_show')
    <div class="col-12 col-lg-8 col-xxl-9 d-flex">
      <div class="card flex-fill">
        <div class="card-body">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>ID LOTO</th>
                <th>Números</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($r->players as $p)
              <tr>
                <td>
                  <a href="{{ route('usuarios.show',$p->usuario->id) }}">
                    {{ $p->usuario->name }}</td>
                  </a>
                <td>
                  <a href="{{ route('usuarios.show',$p->usuario->id) }}">
                    {{ $p->usuario->email }}<
                  </a>
                </td>
                <td>{{ $p->loto->id }}</td>
                <td>{{ $p->loto->code }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
@push('javascript')
<script src="{{ asset('vendor/dinobox/preview-image.js') }}"></script>

@endpush
