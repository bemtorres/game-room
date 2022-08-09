<div class="h3 mb-3">
    <a href="{{ route('cupons.index') }}" class="text-dark"><i class="fa fa-arrow-circle-left"></i></a>
    <strong>Cupones  {{ $c->name }}</strong>
</div>



<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link {{ activeTab("cupons/". $c->id ."/edit") }}" href="{{ route('cupons.edit', $c->id) }}">
      <strong>Cupon {{ $c->name }}</strong>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab("cupon/". $c->id ."/people") }}" href="{{ route('cupon.people', $c->id) }}">
      <strong>Personas</strong>
    </a>
  </li>
</ul>
