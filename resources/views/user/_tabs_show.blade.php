<div class="h3 mb-3">
  <a href="{{ route('usuarios.index') }}" class="text-dark"><i class="fa fa-arrow-circle-left"></i></a>
  <strong>{{ $u->name }}</strong>
</div>

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link {{ activeTab("usuarios/$u->id") }}" href="{{ route('usuarios.show',$u->id) }}">
      <strong>{{ $u->name }}</strong>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab("usuarios/$u->id/edit") }}" href="{{ route('usuarios.edit',$u->id) }}">
      <strong>EDITAR</strong>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab("usuarios/$u->id/credit") }}" href="{{ route('user.credit',$u->id) }}">
      <strong>CREDITOS</strong>
    </a>
  </li>
  {{-- <li class="nav-item">
    <a class="nav-link {{ activeTab("usuarios/$u->id/game") }}" href="{{ route('user.game',$u->id) }}">
      <strong>GAME</strong>
    </a>
  </li> --}}
</ul>
