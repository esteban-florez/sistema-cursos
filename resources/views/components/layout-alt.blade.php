<x-core title="{{ $title }}">
  @prepend('css')
    <link rel="stylesheet" href="{{ asset('css/layout-bg-upta.css') }}">
  @endprepend
  {{ $slot }}
</x-core>