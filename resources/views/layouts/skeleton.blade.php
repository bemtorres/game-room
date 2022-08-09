<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield("title", "GameRoom | 🎮 🕹️")</title>
  <link rel="shortcut icon" href="/gricon.svg" type="image/x-icon">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="{{ asset('vendor/admin/css/app.css') }}" rel="stylesheet">
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/iziToast/css/iziToast.min.css') }}" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    .text-sm {
      font-size: 0.75rem !important;
    }
  </style>
  @stack('stylesheet')
</head>
<body class="text-sm">
  <div id="app">
    @yield('app')
  </div>
  @stack('extra')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="{{ asset('vendor/admin/js/app.js') }}"></script>
  <script src="{{ mix('js/manifest.js') }}"></script>
  <script src="{{ mix('js/vendor.js') }}"></script>
  <script src="{{ mix('js/app.js') }}"></script>
  <script src="{{ asset('vendor/iziToast/js/iziToast.min.js') }}"></script>
  <script src="{{ asset('vendor/pushmenu.js') }}"></script>
  @include('components._toast')
  @stack('javascript')
</body>
</html>
