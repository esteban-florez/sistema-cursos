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
    <x-search placeholder="Buscar área..."/>
    <x-button icon="plus" color="success" hide-text="sm" data-target="#newAreaModal" data-toggle="modal">Añadir</x-button>
  </x-layout.bar>
  <section class="container-fluid">
    <!-- TODO -> Traducir los errores -->
    @if($errors->any())
      <p class="alert alert-warning">Hubo un error: {{ $errors->first() }}</p>
    @endif
    <x-alerts type="success" icon="plus-circle"/>
    <x-alerts type="warning" icon="edit"/>
    <x-alerts type="danger" icon="times-circle"/>
    <div class="row px-2">
      @forelse($areas as $area)
        <x-area-card :area="$area"/>
      @empty
        <div class="card">
          <div class="card-body">
            <h4 class="text-muted">No existen áreas actualmente.</h4>
          </div>
        </div>
      @endforelse
    </div>
  </section>
  <x-slot name="extra">
    @if($edit)
    <x-edit-area :area="$areaToEdit" id="editAreaModal"></x-edit-area>
    <script defer src="{{ asset('js/popup.js') }}"></script>
    @else
    <x-new-area id="newAreaModal"></x-new-area>
    @endif
  </x-slot>
</x-layout.main>