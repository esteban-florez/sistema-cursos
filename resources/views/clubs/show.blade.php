<x-layout.main :title="$club->name">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('clubs.show', $club) }}
  </x-slot>
  @push ('css')
    <link rel="stylesheet" href="{{ asset('css/detalles.css') }}">
  @endpush
  <x-club.details 
    :club="$club"
  />
</x-layout.main>