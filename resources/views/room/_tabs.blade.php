<h1 class="h3 mb-3"><strong>Salas</strong> de Juegos</h1>
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link {{ activeTab("rooms") }}" href="{{ route('rooms.index') }}">
      <strong>ROOMS</strong>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab("rooms/create") }}" href="{{ route('rooms.create') }}">
      <strong>NUEVO</strong>
    </a>
  </li>
</ul>