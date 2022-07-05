@extends('layouts.app')
@push('stylesheet')

@endpush
@section('content')
<main class="content">
  <div class="container-fluid p-0">
    @include('room._tabs_show')


  </div>
</main>
@endsection
@push('javascript')

@endpush
