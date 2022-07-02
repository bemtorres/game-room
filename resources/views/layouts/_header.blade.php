<nav id="sidebar" class="sidebar js-sidebar">
  <div class="sidebar-content js-simplebar">
    <a class="sidebar-brand" href="/home">
      <span class="align-middle">Edugestion</span>
    </a>
    <ul class="sidebar-nav">
      @if (current_user()->admin)
      <li class="sidebar-header">
        ADMINISTRACIÓN
      </li>

      <li class="sidebar-item {{ activeTab("usuarios*") }} {{ activeTab("usuario*") }}">
        <a class="sidebar-link" href="{{ route('usuarios.index') }}">
          <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Usuarios</span>
        </a>
      </li>

      <li class="sidebar-item {{ activeTab("cupons*") }}">
        <a class="sidebar-link" href="{{ route('cupons.index') }}">
          <i class="align-middle" data-feather="book"></i> <span class="align-middle">Cupones</span>
        </a>
      </li>

      <li class="sidebar-item {{ activeTab("room*") }}">
        <a class="sidebar-link" href="{{ route('rooms.index') }}">
          <i class="align-middle" data-feather="home"></i> <span class="align-middle">Salas</span>
        </a>
      </li>

      @endif
      <li class="sidebar-header">
        PANEL
      </li>
      <li class="sidebar-item {{ activeTab("home") }}{{ activeTab("game*") }}">
        <a class="sidebar-link" href="{{ route('home') }}">
          <i class="align-middle fa fa-2x fa-gamepad text-danger"></i>
          <span class="align-middle">Juegos</span>
        </a>
      </li>

      <li class="sidebar-item {{ activeTab("loto*") }}">
        <a class="sidebar-link" href="{{ route('loto.index') }}">
          <i class="align-middle fa fa-2x fa-clipboard ms-2 text-primary"></i>
          <span class="align-middle">Cartones</span>
        </a>
      </li>

      <li class="sidebar-item {{ activeTab("cuenta*") }}">
        <a class="sidebar-link" href="{{ route('cuenta') }}">
          <i class="align-middle fab fa-2x fa-gg-circle text-warning ms-1"></i>
          <span class="align-middle">Mi cuenta</span>
        </a>
      </li>

      <li class="sidebar-item {{ activeTab("trofeos*") }}">
        <a class="sidebar-link" href="{{ route('trofeos') }}">
          <i class="align-middle fa fa-2x fa-trophy text-warning ms-1"></i>
          <span class="align-middle">Mis trofeos</span>
        </a>
      </li>

      {{-- <li class="sidebar-item {{ activeTab("canjear") }}">
        <a class="sidebar-link" href="{{ route('canjear') }}">
          <i class="align-middle" data-feather="tickets"></i> <span class="align-middle">Canjear</span>
        </a>
      </li> --}}
    </ul>
    <div class="sidebar-cta">
      <div class="sidebar-cta-content">
        {{-- <strong class="d-inline-block mb-2">Sistema</strong>
        <div class="mb-3 text-sm">
          Are you looking for more components? Check out our premium version.
          <button class="btn btn-danger btn-sm">asdad</button>
        </div> --}}
        <div class="d-grid">
          <a href="/" class="btn btn-danger btn-sm"><strong>SALIR</strong></a>
        </div>
      </div>
    </div>
    {{-- <div class="sidebar-cta">
      <div class="sidebar-cta-content">
        <strong class="d-inline-block mb-2">Sistema</strong>
        <div class="mb-3 text-sm">
          Are you looking for more components? Check out our premium version.
        </div>
        <div class="d-grid">
          <a href="upgrade-to-pro.html" class="btn btn-primary">EDUGESTION</a>
        </div>
      </div>
    </div> --}}
  </div>
</nav>