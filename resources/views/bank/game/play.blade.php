@extends("layouts.skeleton")
@section('title', "GameRoom | 🎮 🕹️ | ". $r->name)
@push("stylesheet")
@include('bank.game.styles._custom')
@endpush
@section("app")
  <main class="d-flex w-100">
    <div class="container d-flex flex-column">
      <div class="row mt-3">
        <div class="col-sm-12 col-md-10 col-lg-8 mx-auto d-table h-100">
          <div class="d-table-cell align-middle">

            @include('bank.game._profile')
            @include('bank.game.alert._payment')


            @include('bank.game.nav._web')

            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-historial" role="tabpanel" aria-labelledby="pills-historial-tab" tabindex="0">
                @include('bank.game.tab._historial')
              </div>
              <div class="tab-pane fade" id="pills-transfer" role="tabpanel" aria-labelledby="pills-transfer-tab" tabindex="0">
                @include('bank.game.tab._transfer')
              </div>
              <div class="tab-pane fade" id="pills-payment" role="tabpanel" aria-labelledby="pills-payment-tab" tabindex="0">
                @include('bank.game.tab._payment')
              </div>
              <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                @include('bank.game.tab._profile')
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

@include('bank.game.nav._mobile')
@include('bank.game.modal._transfer')
@include('bank.game.modal._payment')
@include('bank.game.modal._collect')
@include('bank.game.modal._avatar')

@endsection
@push("javascript")
<script>

  $("#money_transfer").keyup(function() { validateForm(); });
  $("#n1").keyup(function() { validateForm(); $("#n2").focus(); });
  $("#n2").keyup(function() { validateForm(); $("#n3").focus(); });
  $("#n3").keyup(function() { validateForm(); $("#n4").focus(); });
  $("#n4").keyup(function() { validateForm(); });

  const validarCodeBank = {{ $isBanker ? 'true' : 'false' }};

  function validateCode() {
    if (!validarCodeBank) {
      if($("#n1").val().length > 0
      && $("#n2").val().length > 0
      && $("#n3").val().length > 0
      && $("#n4").val().length > 0
      ) {
        return true;
      }
      return false;
    }
    return true;
  }

  function validateForm() {
    console.log(validateCode());
    if ($("#money_transfer").val() && validateCode()) {
      $("#btn-transfer").removeAttr("disabled");
    } else {
      $("#btn-transfer").attr("disabled", true);
    }
  }

  const modalTransfer = document.getElementById("transferModal");
  modalTransfer.addEventListener("show.bs.modal", event => {
    var reference_tag = $(event.relatedTarget);

    let contact = reference_tag.data("contact");
    let img = reference_tag.data("img");
    let nickname = reference_tag.data("nickname");

    $("#modal-contact").val(contact);
    $("#modal-img").attr("src",img);
    $("#modal-nickname").text(nickname);
  });

  const modalPayment = document.getElementById("paymentModal");
  modalPayment.addEventListener("show.bs.modal", event => {
    var reference_tag = $(event.relatedTarget);

    let contact = reference_tag.data("contact");
    let img = reference_tag.data("img");
    let nickname = reference_tag.data("nickname");

    $("#modalp-contact").val(contact);
    $("#modalp-img").attr("src",img);
    $("#modalp-nickname").text(nickname);
  });

  const modalToPay = document.getElementById("topayModal");
  modalToPay.addEventListener("show.bs.modal", event => {
    var reference_tag = $(event.relatedTarget);

    let contact = reference_tag.data("contact");
    let img = reference_tag.data("img");
    let nickname = reference_tag.data("nickname");

    $("#modalpt-contact").val(contact);
    $("#modalpt-img").attr("src",img);
    $("#modalpt-nickname").text(nickname);
    $("#modalpt_transfer").val("$ 1.000");
    $("#modalpt_comment").val("Transferencia");
  });


  $("#nickname").keyup(function() { validateForm2(); });
  $("#nn1").keyup(function() { validateForm2(); $("#nn2").focus(); });
  $("#nn2").keyup(function() { validateForm2(); $("#nn3").focus(); });
  $("#nn3").keyup(function() { validateForm2(); $("#nn4").focus(); });
  $("#nn4").keyup(function() { validateForm2(); });

  function validateForm2() {
    if ($("#nickname").val() && $("#nn1").val() && $("#nn2").val() && $("#nn3").val() && $("#nn4").val()) {
      $("#btn-play").removeAttr("disabled");
    } else {
      $("#btn-play").attr("disabled", true);
    }
  }

  $('#color-picker').spectrum({
    type: "text",
    showPaletteOnly: true
  });


  $("#nnn1").keyup(function() { validateForm3(); $("#nnn2").focus(); });
  $("#nnn2").keyup(function() { validateForm3(); $("#nnn3").focus(); });
  $("#nnn3").keyup(function() { validateForm3(); $("#nnn4").focus(); });
  $("#nnn4").keyup(function() { validateForm3(); });

  function validateForm3() {
    if ($("#nnn1").val() && $("#nnn2").val() && $("#nnn3").val() && $("#nnn4").val()) {
      $("#btn-to-pay").removeAttr("disabled");
    } else {
      $("#btn-to-pay").attr("disabled", true);
    }
  }
</script>
@endpush
