@extends('layouts.skeleton')
@push('stylesheet')
@endpush
@section('app')
<div class="wrapper">
  @include('layouts._header')
  <div class="main">
    @include('layouts._nav')
    @yield('content')
    @include('layouts._footer')
  </div>
</div>
@endsection
@push('javascript')
@endpush