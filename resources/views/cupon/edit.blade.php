@extends('layouts.app')
@push('stylesheet')

@endpush
@section('content')
<main class="content">
  <div class="container-fluid p-0">
    @include('cupon._tabs_cupon')
    <div class="row">
      <div class="col-6 d-flex">
        <div class="card flex-fill">
          <form class="form-submit" action="{{ route('cupons.update',$c->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group row mb-3">
                    <label for="inputcode" class="col-sm-4 col-form-label"><strong>CÓDIGO</strong><span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputcode" name="code" placeholder="1111A" value="{{ $c->code }}" required>
                    </div>
                  </div>

                  <div class="form-group row mb-3">
                    <label for="inputPass" class="col-sm-4 col-form-label"><strong>PASSWORD</strong></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputPass" name="password"  value="{{ $c->password }}" required placeholder="">
                    </div>
                  </div>

                  <div class="form-group row mb-3">
                    <label for="inputitulo" class="col-sm-4 col-form-label">Título<span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputitulo" name="name" value="{{ $c->name }}" placeholder="" required>
                    </div>
                  </div>
                  <div class="form-group row mb-3">
                    <label for="inputDescripcion" class="col-sm-4 col-form-label">Descripcion</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputDescripcion" name="description" value="{{ $c->description }}"  placeholder="">
                    </div>
                  </div>

                  <div class="form-group row mb-3">
                    <label for="inputPrice" class="col-sm-4 col-form-label">Precio<span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                      <input type="number" min="1" class="form-control" id="inputPrice" name="price"  value="{{ $c->price }}" placeholder="" required>
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
