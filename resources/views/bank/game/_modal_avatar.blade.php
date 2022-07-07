{{-- Modal Avatar --}}
<div class="modal fade" id="avatarModal" tabindex="-1" aria-labelledby="avatarModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="avatarModalLabel">Selecciona tu avatar favorito</h5>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form class="form-submit" action="{{ route('game.bank.avatar',$r->id) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="mb-3">
            {{-- <label class="form-label text-lg mt-2"></label> --}}
            <div class="container parent table-wrapper-scroll-y my-custom-scrollbar">
              <div class="row">
                @for ($i = 1; $i < 24; $i++)
                  <div class="col col-4 col-sm-4 col-md-4 col-lg-3 text-center">
                    <input type="radio" name="imagen" id="img{{ $i }}" class="d-none imgbgchk" value="{{ $i }}" {{ $i==1 ? 'required' : '' }} {{ $user_room->config['img'] == $i ? 'checked' : '' }}>
                    <label for="img{{ $i }}">
                      <img src="{{ asset('assets/game/personajes/'.$i.".png") }}" class="rounded-2" alt="Image {{ $i }}">
                      <div class="tick_container">
                        <div class="tick"><i class="fa fa-check"></i></div>
                      </div>
                    </label>
                  </div>
                @endfor
              </div>
            </div>
          </div>
          <div class="d-grid gap-2">
            <button type="submit" id="btn-avatar" class="btn btn-lg btn-primary p-3"><strong>CAMBIAR</strong></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
