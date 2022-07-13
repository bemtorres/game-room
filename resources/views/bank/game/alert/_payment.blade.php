
@if ($payment_requests)

@php
  $name_pr = '';
  $money_pr = $payment_requests->getMoney();
  $contact_pr = $payment_requests->transmitter_user_id;
  $comment_pr = $payment_requests->getConfigComment();

  if ($payment_requests->money_bank) {
    $name_pr = $r->name;
    $photo_pr = asset($r->getPhoto());
  } else {
    $name_pr = $payment_requests->transmitter_user->getNickname();
    $photo_pr = asset($payment_requests->transmitter_user->getPhoto());
  }

@endphp

<div class="alert alert-warning shadow alert-dismissible fade show" role="alert">
  {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
  <div class="row">
    <div class="col-12 col-md-6 mb-2 mb-md-0">
      <i class="bi bi-bell-fill me-md-2"></i>
      Tienes una solicitud de cobro por <strong>{{ $name_pr }}</strong> de <strong>$ {{ $money_pr }}</strong>
    </div>
    <div class="col-12 col-md-6">
      <div class="text-center d-grid gap-2">
        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#topayModal"
        data-request = "{{ $payment_requests->id }}"
        data-contact="{{ $contact_pr }}"
        data-img="{{ $photo_pr }}"
        data-nickname="{{ $name_pr }}"
        data-money="{{ $money_pr }}"
        data-comment="{{ $comment_pr }}"
        >
          <i class="bi bi-credit-card-2-front-fill me-2"></i>
          <strong>PAGAR</strong>
        </button>
      </div>
    </div>
  </div>
</div>
@endif

