@props(['club'])

<x-profile.card :image="asset($club->image)" alt="club">
  <div class="mb-2">
    <h5 class="mb-0">{{ $club->name }}</h5>
    <span class="text-muted">{{ $club->excerpt }}</span>
  </div>
  <div class="d-flex align-items-center gap-1">
    <x-button color="danger">Retirarse</x-button>
    <x-button url="{{ route('clubs.show', $club->id) }}">Detalles</x-button>
  </div>
</x-profile.card>