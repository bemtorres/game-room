<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link {{ activeTab("cupons") }}" href="{{ route('cupons.index') }}">
      <strong>CUPONES</strong>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab("cupons/create") }}" href="{{ route('cupons.create') }}">
      <strong>NUEVO</strong>
    </a>
  </li>
</ul>