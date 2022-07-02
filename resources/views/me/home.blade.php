@extends('layouts.app')
@push('stylesheet')
@endpush
@section('content')
<main class="content">
  <div class="container-fluid p-0">
    <h1 class="h3 mb-3"><strong>JUEGOS</strong> Disponibles</h1>

    <div class="bg-white">
      <header class="d-flex justify-content-center py-3">
        <ul class="nav nav-pills">
          <li class="nav-item">
            <a href="{{ route('home') }}" class="btn btn-primary">
              <i class="fa fa-play-circle"></i>
              Disponibles
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('home.finalizado') }}" class="btn btn-success ms-2">
              <i class="fa fa-check-circle"></i>
              Terminados
            </a>
          </li>
        </ul>
      </header>
    </div>


    <div class="row album py-2 bg-light">
      @foreach ($rooms as $r)
      <div class="col-md-3 d-flex align-items-stretch">
        <div class="card">
          <img src="https://www.yucatan.com.mx/wp-content/uploads/2020/07/Lotto_5.jpeg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5>{{ $r->name }}</h5>
            {{-- <h2 class="card-title"></h2> --}}
            {{-- <p>{{ $r->description }}</p> --}}
            <p class="card-text">{{ $r->description }}</p>
          </div>
          <div class="card-footer">
            <div class="d-grid gap-2">
              @if ($r->status == 3)
                <a class="btn btn-success" href="{{ route('game.show', $r->id) }}">
                  <strong><i class="fa fa-trophy text-warning m-2"></i> VER RESULTADOS</strong>
                </a>
              @else
              @if ($r->selected)
                <a class="btn btn-primary" href="{{ route('game.show', $r->id) }}">
                  <strong><i class="fa fa-play text-warning m-2"></i> JUGAR</strong>
                </a>
                @else
                  <a class="btn btn-dark" {{ $r->status == 1 ? 'disabled' : '' }} href="{{ route('game.show', $r->id) }}">
                    <strong>JUGAR POR <i class="fab fa-gg-circle text-warning m-2"></i>{{ $r->getPrice() }}</strong>
                  </a>
                @endif
              @endif
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</main>

@endsection
@push('javascript')

@endpush