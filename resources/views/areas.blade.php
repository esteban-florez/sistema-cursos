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
    <div class="row px-3">
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
    <x-area-modal id="newAreaModal"></x-area-modal>
  </x-slot>
</x-layout.main>