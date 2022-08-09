@extends('layouts.app')
@push('stylesheet')

@endpush
@section('content')
<main class="content">
  <div class="container-fluid p-0">
    @include('room._tabs')
    <div class="row">
      <div class="col-6 d-flex">
        <div class="card flex-fill">
          <form class="form-submit" action="{{ route('rooms.store') }}" method="post">
            @csrf
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group row mb-3">
                    <label for="inputCorreo" class="col-sm-4 col-form-label">Tipo de juego</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="type" id="type" required>
                        <option value="1">Lotería</option>
                        <option value="2">Banco</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row mb-3">
                    <label for="inputNombre" class="col-sm-4 col-form-label">Nombre</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputNombre" name="name" placeholder="" required>
                    </div>
                  </div>
                  <div class="form-group row mb-3">
                    <label for="inputCorreo" class="col-sm-4 col-form-label">Descripcion</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputNombre" name="description" placeholder="">
                    </div>
                  </div>

                  <div class="form-group row mb-3">
                    <label for="inputCorreo" class="col-sm-4 col-form-label">Password</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="ipassword" name="password" placeholder="">
                    </div>
                  </div>
                  <div class="form-group row mb-3">
                    <label for="inputCorreo" class="col-sm-4 col-form-label">Precio</label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" id="iprice" name="price" placeholder="">
                    </div>
                  </div>
                  {{-- <div class="form-group row mb-3">
                    <label for="inputCorreo" class="col-sm-4 col-form-label">Premio</label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" id="ireward" name="reward" placeholder="">
                    </div>
                  </div> --}}
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                  <button class="btn btn-primary" type="submit">Guardar</button>
                </div>
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
