<x-layout.app :title="$title" :extra="$extra ?? null">
    <main class="content-wrapper">
        <x-layout.title section="{{ $title }}">
            {{ $title }}
        </x-layout.title>
        {{ $slot }}
    </main>
</x-layout.app>