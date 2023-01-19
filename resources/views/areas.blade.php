@php
    $edit = isset($areaToEdit);
@endphp

<x-layout.main title="Áreas">
  @push('css')
    <link rel="stylesheet" href="{{ asset('css/areas.css') }}">
  @endpush
  @push('js')
    <script defer src="{{ asset('js/areas.js') }}"></script>
  @endpush
  <x-layout.bar>
    <x-search name="search" :action="route('areas.index')" placeholder="Buscar área..." :value="$search ?? ''"/>
    <x-button icon="plus" color="success" hide-text="sm" data-target="#newAreaModal" data-toggle="modal">Añadir</x-button>
  </x-layout.bar>
  <section class="container-fluid">
    {{-- TODO -> 1 --}}
    @if($errors->any())
      <p class="alert alert-warning">Hubo un error: {{ $errors->first() }}</p>
    @endif
    <x-alerts type="success" icon="plus-circle"/>
    <x-alerts type="warning" icon="edit"/>
    <x-alerts type="danger" icon="times-circle"/>
    @forelse($areas as $area)
      <div class="row px-2">
        <x-area.card :area="$area"/>
      </div>
    @empty
      <div class="empty-container">
        <h2 class="empty">No hay areas registradas</h2>
      </div>
    @endforelse
  </section>
  <x-slot name="extra">
    @if($edit)
    <x-area.edit :pnfs="$pnfs" :area="$areaToEdit" id="editAreaModal"></x-area.edit>
    <script defer src="{{ asset('js/popup.js') }}"></script>
    @else
    <x-area.new id="newAreaModal" :pnfs="$pnfs"></x-area.new>
    @endif
  </x-slot>
</x-layout.main>