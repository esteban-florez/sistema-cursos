<x-layout.app :title="$title">
  <main class="content-wrapper">
    <x-layout.title :subtitle="$subtitle ?? null">
      {{ $title }}
    </x-layout.title>
    {{ $slot }}
  </main>
</x-layout.app>