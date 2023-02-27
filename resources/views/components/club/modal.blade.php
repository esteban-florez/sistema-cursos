@props(['club', 'membership' => null])

@php
  $operation = $membership ? 'retirarse del' : 'unirse al';
  $action = $membership 
    ? route('memberships.destroy', $membership) 
    : route('memberships.store', ['club' => $club]);
@endphp

<x-modal id="clubModal">
  <x-slot name="header">
    <h4>Confirmación</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span class="text-white">&times;</span>
    </button>
  </x-slot>
  <h5 class="font-weight-normal mb-3">¿Desea {{ $operation }} club de {{ $club->name }}?</h5>
  <form method="POST" action="{{ $action }}">
    @csrf
    @if ($membership) @method('DELETE') @endif
    <x-button color="danger" icon="times" data-dismiss="modal">
      Cancelar
    </x-button>
    <x-button type="submit" color="success" icon="check">
      Aceptar
    </x-button>
  </form>
</x-modal>