@props(['club'])

<x-profile.card>
  <x-slot name="image">
    <img class="img-fluid img-cover h-100 rounded-left"
      src="{{ asset($club->image) }}"
      alt="imagen del Club: {{ $club->name }}" 
    />
  </x-slot>
  <x-slot name="body">
    <h4>{{ $club->name }}</h4>
    <p class="card-text">{{ $club->excerpt }}</p>
    <div class="d-flex align-items-center gap-1">
      <x-button :url="route('clubs.show', $club)" icon="list">Detalles</x-button>
    </div>
  </x-slot>
</x-profile.card>