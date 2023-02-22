@props(['membership'])
@php
  $club = $membership->club;
@endphp
<x-profile.card>
  <x-slot name="image">
    <img class="img-fluid img-cover h-100 rounded-left"
      src="{{ asset($club->image) }}"
      alt="imagen del Club: {{ $club->name }}" 
    />
  </x-slot>
  <x-slot name="body">
    <h4>{{ $club->name }}</h4>
    <p class="text-muted">{{ $club->excerpt }}</p>
    <div class="d-flex align-items-center gap-1">
      <x-button color="danger">Retirarse</x-button>
      <x-button :url="route('clubs.show', $club->id)">Detalles</x-button>
    </div>
  </x-slot>
</x-profile.card>