<div class="h3 mb-3">
  <a href="{{ route('rooms.index') }}" class="text-dark"><i class="fa fa-arrow-circle-left"></i></a>
  <strong>{{ $r->name }}</strong>

  <span class="badge bg-{{ $r->getStatus()[2] }}">
    <i class="{{ $r->getStatus()[1] }}"></i>
    {{ $r->getStatus()[0] }}
  </span>
</div>


<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link {{ activeTab("rooms/$r->id") }}" href="{{ route('rooms.show',$r->id) }}">
      <strong>{{ $r->name }}</strong>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab("rooms/$r->id/edit") }}" href="{{ route('rooms.edit',$r->id) }}">
      <strong>EDITAR</strong>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab("room/$r->id/players") }}" href="{{ route('room.players',$r->id) }}">
      <strong>JUGADORES</strong>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab("room/$r->id/solicitudes") }}" href="{{ route('room.solicitudes',$r->id) }}">
      <strong>SOLICITUDES</strong>
    </a>
  </li>
</ul>