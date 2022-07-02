@extends('layouts.app')
@push('stylesheet')

@endpush
@section('content')
<main class="content">
  <div class="container-fluid p-0">
    @include('user._tabs_show')
    <div class="row">
      <div class="col-6 d-flex">
        <div class="card flex-fill">
          <div class="card-header">
            <h5 class="card-title mb-0">{{ $u->name }}</h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
@push('javascript')

@endpush