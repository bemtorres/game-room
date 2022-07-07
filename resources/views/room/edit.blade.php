@extends('layouts.app')
@push('stylesheet')

@endpush
@section('content')
<main class="content">
  <div class="container-fluid p-0">
    @include('room._tabs_show')
    <div class="row">
      <div class="col-12 col-md-6">
        <div class="card">
          <form class="form-submit" action="{{ route('rooms.update',$r->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group row mb-3">
                    <label for="inputNombre" class="col-sm-4 col-form-label">Nombre</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputNombre" name="name" placeholder="" value="{{ $r->name }}" required>
                    </div>
                  </div>
                  <div class="form-group row mb-3">
                    <label for="inputCorreo" class="col-sm-4 col-form-label">Descripcion</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputNombre" name="description" value="{{ $r->description }}"  placeholder="">
                    </div>
                  </div>
                  {{-- <div class="form-group row mb-3">
                    <label for="inputDescripcion" class="col-sm-4 col-form-label">Código</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputDescripcion" name="code"  value="{{ $r->code }}"  placeholder="">
                    </div>
                  </div> --}}
                  <div class="form-group row mb-3">
                    <label for="inputCorreo" class="col-sm-4 col-form-label">Password</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputNombre" name="password"  value="{{ $r->password }}"  placeholder="">
                    </div>
                  </div>

                  {{-- <div class="card">
                    <div class="card-header">
                      <h5 class="card-title mb-0">Selects</h5>
                    </div>
                    <div class="card-body">
                      <select class="form-select mb-3">
                        <option selected>Open this select menu</option>
                        <option>One</option>
                        <option>Two</option>
                        <option>Three</option>
                      </select>

                      <select multiple class="form-control">
                        <option>One</option>
                        <option>Two</option>
                        <option>Three</option>
                        <option>Four</option>
                      </select>
                    </div>
                  </div> --}}

                  <div class="form-group row mb-3">
                    <label for="inputCorreo" class="col-sm-4 col-form-label">Precio</label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" id="inputNombre" name="price"  value="{{ $r->price }}"  placeholder="">
                    </div>
                  </div>

                  <div class="form-group row mb-3">
                    <label for="inputCorreo" class="col-sm-4 col-form-label">Estado</label>
                    <div class="col-sm-8">
                      <select class="form-select mb-3" name="status">
                        @foreach ($estados as $key => $value)
                        <option {{ $r->status == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value[0] }}</option>
                        @endforeach

                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-primary" type="submit">Guardar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      @if ($r->type == 2)
      <div class="col-12 col-md-6">
        <div class="card">
          <form class="form-submit" action="{{ route('rooms.update_v2',$r->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">

                  <div class="form-group row mb-3">
                    {{-- <label for="inputURL" class="col-sm-4 col-form-label">URL PÚBLICA</label> --}}
                    <div class="col-sm-12">
                      <input type="text" class="form-control" readonly value="{{ route('app.room.share', $r->url) }}">
                    </div>
                  </div>


                  <div class="form-group row mb-3">
                    <label for="inputURL" class="col-sm-4 col-form-label">URL PÚBLICA</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputURL" data-code="#inputURLCODE" name="url"  value="{{ $r->url }}"  placeholder="">
                    </div>
                  </div>

                  <div class="form-group row mb-3">
                    <label for="inputURLCODE" class="col-sm-4 col-form-label">URL FORMATO WEB</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" readonly id="inputURLCODE" name="url_web"  value="{{ $r->url }}"  placeholder="">
                    </div>
                  </div>

                  <div class="form-group row mb-3">
                    <label for="inputURLCODE" class="col-sm-4 col-form-label">ACTIVAR WEB PÚBLICA</label>
                    <div class="col-sm-8">
                      <div class="form-check">
                        <input class="form-check-input p-2" type="checkbox" name="enable_public" {{ $r->getConfigEnablePublic() ? 'checked' : '' }} />
                        <label class="form-check-label ms-2" for="">
                          Habilitar
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group row mb-3">
                    <label for="inputURLCODE" class="col-sm-4 col-form-label">Registro rápido</label>
                    <div class="col-sm-8">
                      <div class="form-check">
                        <input class="form-check-input p-2" type="checkbox" name="enable_register" {{ $r->getConfigEnableRegister() ? 'checked' : ''}} />
                        <label class="form-check-label ms-2" for="">
                          Habilitar
                        </label>
                      </div>
                    </div>
                  </div>




                  <div class="d-md-flex justify-content-md-end">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      @endif
    </div>
  </div>
</main>
@endsection
@push('javascript')
<script>
  $("#inputURL").keyup(function() {
    $($(this).data("code")).val(makeSlug(this.value));
  });

function makeSlug(text) {
  var a = 'àáäâèéëêìíïîòóöôùúüûñçßÿœæŕśńṕẃǵǹḿǘẍźḧ·/_,:;';
  var b = 'aaaaeeeeiiiioooouuuuncsyoarsnpwgnmuxzh------';
  var p = new RegExp(a.split('').join('|'), 'g');

  return text.toString().toLowerCase().replace(/\s+/g, '-')
    .replace(p, function(c) {
      return b.charAt(a.indexOf(c));
    })
    .replace(/&/g, '-y-')
    .replace(/[^\w\-]+/g, '')
    .replace(/\-\-+/g, '-')
    .replace(/^-+/, '')
    .replace(/-+$/, '');
}
</script>

@endpush
