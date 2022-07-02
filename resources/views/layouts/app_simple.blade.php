@extends('layouts.skeleton')
@push('stylesheet')
@endpush
@section('app')
<div class="wrapper">
  <div class="main">
    @yield('content')
  </div>
</div>
@endsection
@push('javascript')
@endpush