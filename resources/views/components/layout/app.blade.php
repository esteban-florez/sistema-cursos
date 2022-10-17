<x-layout.core :title="$title">
  @prepend('css')
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
  @endprepend
  <body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed">
    <div class="wrapper">
      <x-layout.header/>
      <x-layout.sidebar/>
      {{ $slot }}
      <x-layout.footer/>
    </div>
    <x-layout.info-modal/>
    {{ $extra ?? '' }}
  </body>
</x-layout.core>