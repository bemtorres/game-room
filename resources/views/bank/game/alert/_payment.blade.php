<div class="alert alert-warning shadow alert-dismissible fade show" role="alert">
  {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
  <div class="row">
    <div class="col-12 col-md-6 mb-2 mb-md-0">
      <i class="bi bi-bell-fill me-md-2"></i>
      Tienes una solicitud de pago de <strong>Perro loco</strong> por <strong>$ 1.000</strong>
    </div>
    <div class="col-12 col-md-6">
      <div class="text-center d-grid gap-2">
        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#topayModal" data-contact="0" data-img="{{ asset($r->getPhoto()) }}" data-nickname="{{ $r->name }}">
          <i class="bi bi-credit-card-2-front-fill me-2"></i>
          <strong>PAGAR</strong>
        </button>
      </div>
    </div>
  </div>
</div>
