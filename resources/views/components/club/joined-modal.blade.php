@props(['club'])

<x-modal id="clubModal{{ $club->id }}">
  <x-slot name="header">
    <h4>Confirmación</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span class="text-white">&times;</span>
    </button>
  </x-slot>
  <h5 class="font-weight-normal mb-3">¿Desea unirse al club de {{ $club->name }}?</h5>
  <form method="POST" action="{{ route('memberships.store', ['club' => $club->id]) }}">
    @csrf
    <x-button :url="route('clubs.show', $club->id)" color="danger" icon="times">
      Cancelar
    </x-button>
    <x-button type="submit" color="success" icon="check">
      Aceptar
    </x-button>
  </form>
</x-modal>