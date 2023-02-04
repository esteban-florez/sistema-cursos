@php
    $edit = isset($areaToEdit);
@endphp

<x-layout.main title="Áreas">
  <x-select2/>
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('areas.index') }}
  </x-slot>
  @push('css')
    <link rel="stylesheet" href="{{ asset('css/areas.css') }}">
  @endpush
  <x-layout.bar>
    <x-search name="search" placeholder="Buscar área..." :value="$search ?? ''"/>
    <x-button icon="plus" color="success" hide-text="sm" data-target="#newAreaModal" data-toggle="modal">Añadir</x-button>
  </x-layout.bar>
  <section class="container-fluid">
    {{-- TODO -> 1 --}}
    @if($errors->any())
      <p class="alert alert-warning">Hubo un error: {{ $errors->first() }}</p>
    @endif
    <x-alert />
    @if ($areas->isNotEmpty())
      <div class="row px-2">
        @foreach($areas as $area)
        <x-area.card :area="$area"/>
        @endforeach
      </div>
    @else
      <div class="empty-container">
        <h2 class="empty">No hay areas registradas</h2>
      </div>
    @endif
    <div class="d-flex justify-content-center">
      {{ $areas->links() }}
    </div>
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