{{-- TODO -> Arreglarlo xd, ya lo hice así y no lo queria eliminar --}}
<title>@yield('title') | Sistema de Cursos y Clubes Universitarios</title>
<x-layout.app-alt title="">
  @push('css')
    <link rel="stylesheet" href="{{ asset('css/errors.css') }}">
  @endpush
  <body class="login-page">
    <div class="overlay"></div>
    <div class="box-error w-75">
      <div class="content">
        <div class="title">
            @yield('code', __('Oh no'))
        </div>
        <div class="line-blue-light"></div>
        <p class="message">
            @yield('message')
        </p>
        <x-button :url="route('home')" hide-text="sm" icon="arrow-left" class="button btn-lg">
          Volver
        </x-button>
      </div>
    </div>
  </body>
</x-layout.app-alt>
