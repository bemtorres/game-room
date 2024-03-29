@if ($isMobile)
<ul class="navbar nav nav-pills nav-justified navbar_down navbar-light bg-light d-sm-block d-md-none" id="pills-tab" role="tablist">
  <li class="nav-item px-2" role="presentation">
    <button class="nav-link active" id="pills-historial-tab" data-bs-toggle="pill" data-bs-target="#pills-historial" type="button" role="tab" aria-controls="pills-historial" aria-selected="true">
      <i class=" bi bi-wallet2"></i>
      <span class="small d-block">Historial</span>
    </button>
  </li>
  <li class="nav-item px-2" role="presentation">
    <button class="nav-link" id="pills-transfer-tab" data-bs-toggle="pill" data-bs-target="#pills-transfer" type="button" role="tab" aria-controls="pills-transfer" aria-selected="false">
      <i class="bi bi-cash-coin"></i>
      <span class="small d-block">Cobrar</span>
    </button>
  </li>
  <li class="nav-item px-2" role="presentation">
    <button class="nav-link" id="pills-charge-tab" data-bs-toggle="pill" data-bs-target="#pills-charge" type="button" role="tab" aria-controls="pills-charge" aria-selected="false">
      <i class="bi bi-credit-card"></i>
      <span class="small d-block">Depositar</span>
    </button>
  </li>
  <li class="nav-item px-2" role="presentation">
    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
      <i class=" bi bi-person-circle"></i>
      <span class="small d-block">Perfil</span>
    </button>
  </li>
</ul>
@endif
