<x-core title="{{ $title }}">
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/layout-bg-upta.css') }}">
    @endpush
    {{ $slot }}
</x-core>