<x-core title={{$title}}>
  @prepend('css')
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
  @endprepend
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
    {{ $extra ?? '' }}
  </body>
</x-core>