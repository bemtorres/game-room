<h1 class="h3 mb-3"><strong>Usuarios</strong></h1>

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link {{ activeTab("usuarios") }}" href="{{ route('usuarios.index') }}">
      <strong>JUGADORES</strong>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab("usuario/admin") }}" href="{{ route('user.admin') }}">
      <strong>ADMINISTRADORES</strong>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab("usuarios/create") }}" href="{{ route('usuarios.create') }}">
      <strong>NUEVO</strong>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab("usuario/masiva") }}" href="{{ route('user.masiva') }}">
      <strong>CARGA MASIVA</strong>
    </a>
  </li>
</ul>