<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/errors.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <title>@yield('title')</title>

  </head>
  <body class="bg-light">
    <div class="box-error">
      <div class="content">
        <div class="title">
            @yield('code', __('Oh no'))
        </div>
        <div class="line-blue-light"></div>
        <p class="message">
            @yield('message')
        </p>
        <x-button :url="URL::previous()" icon="arrow-left" class="btn-lg" style="width: 35%;">
          <span class="text-white">Volver</span>
        </x-button>
      </div>
    </div>
  </body>
</html>
