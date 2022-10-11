<x-core title={{$title}}>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    @endpush
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
</x-core>