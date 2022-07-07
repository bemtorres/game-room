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
                <th></th>
                <th>Enviado por</th>
                <th>Recibido por</th>
                <th class="text-end">Dinero</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($transactions as $t)
              <tr>
                <td>
                  {{ $t->getFechaCreacion()->getDateTime() }}
                </td>
                <td>
                  @if ($t->transmitter_user ?? false)
                    <img src="{{ $t->transmitter_user->getPhoto() }}" width="40" alt="">
                    {{ $t->transmitter_user->getNickname() }}
                  @else
                    <img src="{{ asset($r->getPhoto()) }}" width="40" alt="">
                    {{ $r->name }}
                  @endif
                </td>
                <td>
                  @if ($t->receiver_user ?? false)
                    <img src="{{ $t->receiver_user->getPhoto() }}" width="40" alt="">
                    {{ $t->receiver_user->getNickname() }}
                  @else
                    <img src="{{ asset($r->getPhoto()) }}" width="40" alt="">
                    {{ $r->name }}
                  @endif
                </td>
                <td class="text-end fw-bold">$ {{ $t->getMoney() }}</td>
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
