@extends('layouts.app')
@push('stylesheet')

@endpush
@section('content')
<main class="content">
  <div class="container-fluid p-0 row">
    @include('room._tabs_show')


    <div class="col-3">
      <div class="card">
        <img class="card-img-top" src="{{ asset($r->getPhoto()) }}" alt="Title">
        <div class="card-body">
          <h4 class="card-title">{{ $r->name }}</h4>
          <p class="card-text fw-bold">$ {{ $r->getBankMoney() }}</p>
        </div>
      </div>
    </div>

    <div class="col-9 d-flex">
      <div class="card flex-fill">
        <div class="card-body">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Dinero</th>
                <th>Banquero</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($r->players_bank as $p)
              <tr>
                <td>
                  <a href="{{ route('usuarios.show',$p->usuario->id) }}">
                    {{ $p->usuario->name }}</td>
                  </a>
                <td>
                  <a href="{{ route('usuarios.show',$p->usuario->id) }}">
                    {{ $p->usuario->email }}
                  </a>
                </td>
                <td>$ {{ $p->getMoney() }}</td>
                <td>
                  @if ($p->banker)
                    Si
                  @else
                    No
                  @endif
                </td>
                <td>
                  <form action="{{ route('rooms.bank.players', $r->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="user_id" value="{{ $p->user_id }}">
                    <button type="submit" name="option" value="bank" class="btn btn-primary btn-sm">Bankero</button>
                  </form>
                </td>
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

@endpush
