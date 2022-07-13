<div class="card shadow rounded-3">
  <div class="card-body">
    <div class="text-center fw-bold">
      Contactos
    </div>
    <div class="table-wrapper-scroll-y my-custom-scrollbar">

      <table class="table table-hover">
        <tbody>
          @if (!$isBanker)
          <tr data-bs-toggle="modal" data-bs-target="#chargeModal" data-contact="0" data-img="{{ asset($r->getPhoto()) }}" data-nickname="{{ $r->name }}">
            <td>
              <img src="{{ asset($r->getPhoto()) }}" width="60px" height="60px" class="img-fluid rounded" alt="...">
            </td>
            <td>
              <p class="fw-bold h6">{{ $r->name }}</p>
            </td>
          </tr>
          @endif
          @foreach ($contacts as $c)
          <tr>
            <td data-bs-toggle="modal" data-bs-target="#chargeModal" data-contact="{{ $c->id }}" data-img="{{ asset($c->getPhoto()) }}" data-nickname="{{ $c->getNickname() }}">
              <img src="{{ $c->getPhoto() }}" width="60px" height="60px" class="img-fluid rounded" alt="">
            </td>
            <td>
              <p class="fw-bold h6">{{ $c->getNickname() }}</p>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
