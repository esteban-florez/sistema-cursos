<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
   {{ $title }} | Departamento de Vinculación Social
  </title>  
  <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
  @stack('styles')
  <script defer src="{{ asset('js/jquery.min.js') }}"></script>
  <script defer src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
  <script defer src="{{ asset('js/adminlte.min.js') }}"></script>
  @stack('scripts')
</head>

<body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed">
  <div class="wrapper">
    <x-header/>
    <x-sidebar/>
    <main class="content-wrapper">
      {{ $slot }}
    </main>
    <x-footer/>
  </div>
  <x-info-modal/>
</body>

</html>