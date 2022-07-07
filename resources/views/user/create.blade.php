@extends('layouts.app')
@push('stylesheet')

@endpush
@section('content')
<main class="content">
  <div class="container-fluid p-0">
    @include('user._tabs')
    <div class="row">
      <div class="col-6 d-flex">
        <div class="card flex-fill">
          {{-- <div class="card-header"> --}}
            {{-- <h5 class="card-title mb-0">Latest Projects</h5> --}}
          {{-- </div> --}}
          <form class="form-submit" action="{{ route('usuarios.store') }}" method="post">
            @csrf
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group row mb-3">
                    <label for="inputNombre" class="col-sm-4 col-form-label">Nombre</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputNombre" name="name" placeholder="" required>
                    </div>
                  </div>
                  <div class="form-group row mb-3">
                    <label for="inputCorreo" class="col-sm-4 col-form-label">Correo</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputNombre" name="email" autocomplete="new-email"  placeholder="" required>
                    </div>
                  </div>
                  <div class="form-group row mb-3">
                    <label for="inputCorreo" class="col-sm-4 col-form-label">Password</label>
                    <div class="col-sm-8">
                      <input type="password" class="form-control" id="inputNombrePasswprd" autocomplete="new-password" name="password" placeholder="" required>
                    </div>
                  </div>
                  <div class="form-group row mb-3">
                    <label for="inputCorreo" class="col-sm-4 col-form-label">Telefono</label>
                    <div class="col-sm-8">
                      <input type="tel" class="form-control" id="inputNombre" name="phone" placeholder="">
                    </div>
                  </div>
                  <div class="form-group row mb-3">
                    <label for="inputCorreo" class="col-sm-4 col-form-label">Creditos</label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" id="inputNombre" name="credit" placeholder="">
                    </div>
                  </div>

                  <div class="btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-primary">
                      <input type="checkbox" name="admin"> Es administrador
                    </label>
                  </div>

                </div>
                {{-- <div class="col-md-6">
                  <h3>RRSS</h3>
                  <div class="form-group row mb-3">
                    <label class="col-sm-12 mb-1">
                      <i class="fab fa-instagram text-warning"></i> Ingresa link de Instagram
                    </label>
                    <div class="col-sm-12">
                      <div class="input-group">
                        <span class="input-group-text" id="basic-addon3">https://instagram.com/</span>
                        <input type="text" class="form-control" name="config_instagram" value="" placeholder="instagram"/>
                      </div>
                    </div>
                  </div>

                  <div class="form-group row mb-3">
                    <label class="col-sm-12 mb-1">
                      <i class="fab fa-facebook text-primary"></i> Ingresa link de Facebook
                    </label>
                    <div class="col-sm-12">
                      <div class="input-group">
                        <span class="input-group-text" id="basic-addon3">https://facebook.com/</span>
                        <input type="text" class="form-control" name="config_facebook" value="" placeholder="facebook"/>
                      </div>
                    </div>
                  </div>

                  <div class="form-group row mb-3">
                    <label class="col-sm-12 mb-1">
                      <i class="fab fa-youtube text-danger"></i> Ingresa canal de youtube
                    </label>
                    <div class="col-sm-12">
                      <div class="input-group">
                        <span class="input-group-text" id="basic-addon3">https://youtube.com/</span>
                        <input type="text" class="form-control" name="config_youtube" value="" placeholder="canal"/>
                      </div>
                    </div>
                  </div>

                  <div class="form-group row mb-3">
                    <label class="col-sm-12 mb-1">
                      <i class="fab fa-linkedin text-primary"></i> Ingresa link de Linkedin
                    </label>
                    <div class="col-sm-12">
                      <div class="input-group">
                        <span class="input-group-text" id="basic-addon3">https://www.linkedin.com/</span>
                        <input type="text" class="form-control" name="config_linkedin" value="" placeholder="empresa"/>
                      </div>
                    </div>
                  </div>

                  <div class="form-group row mb-3">
                    <label class="col-sm-12 mb-1">
                      <i class="fab fa-whatsapp text-success"></i> Número de Whatsapp
                    </label>
                    <div class="col-sm-12">
                      <div class="input-group">
                        <input type="number" class="form-control" name="config_whatsapp" value="" placeholder="5691111111"/>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row mb-3">
                    <label class="col-sm-12 mb-1">
                      <i class="fa fa-phone-square-alt text-dark"></i> Telefono de contacto
                    </label>
                    <div class="col-sm-12">
                      <div class="input-group">
                        <input type="number" class="form-control" name="config_telefono" value="" placeholder="5691111111"/>
                      </div>
                    </div>
                  </div>
                </div> --}}
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
    </div>
  </div>
</main>
@endsection
@push('javascript')
<script src="{{ asset('vendor/dinobox/preview-image.js') }}"></script>

@endpush
