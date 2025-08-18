<x-layout.core :title="$title">
  @prepend('css')
    <link rel="stylesheet" href="{{ asset('css/layout-bg.css') }}">
  @endprepend
  {{ $slot }}
</x-layout.core>
