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
          <div class="card-header">
            <h3 class="card-title">Importar alumnos</h3>
            <a href="/template/template_users.xlsx" class="btn btn-primary btn-sm">Descargar template</a>
          </div>
          <form class="form-submit" action="{{ route('user.import') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="hf-rut">SUBIR ARCHIVO</label>
                    <div class="col-sm-8">
                      <input type="file" name="document" accept="" required/>
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
    </div>
  </div>
</main>
@endsection
@push('javascript')
<script src="{{ asset('vendor/dinobox/preview-image.js') }}"></script>

@endpush