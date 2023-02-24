<x-layout.main title="Artículos">
  @push('js')
    <script type="module" src="{{ asset('js/items.js') }}"></script>
  @endpush
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('items.index') }}
  </x-slot>
  <x-slot name="titleAddon">
    <x-button color="success" icon="plus" id="addItem" data-toggle="modal" data-target="#createModal">
      Añadir
    </x-button>
  </x-slot>
  <x-errors />
  <section class="container-fluid">
    @if ($items->isNotEmpty())
      <div class="row mt-2" style="row-gap: 1rem;">
        @foreach ($items as $item)
          <div class="col-md-4 d-flex">
            <div class="card h-100 mb-0">
              <div class="card-body d-flex flex-column align-items-center justify-content-center">
                <h4>{{ $item->name }}</h4>
                <h6 class="card-subtitle mb-2 text-muted">Código: #{{ $item->code }}</h5>
                <p class="card-text">{{ $item->description }}</p>
                <div class="align-self-start">
                  <x-button icon="list">
                    Operaciones
                  </x-button>
                  <x-button :url="route('items.edit', $item->id)" color="warning" icon="edit">
                    Editar
                  </x-button>
                </div>
              </div>
            </div>  
          </div>
        @endforeach
      </div>
    @else
      <div class="empty-container">
        <h2 class="empty">No hay artículos registrados.</h2>
      </div>
    @endif
  </section>
  <div class="d-flex justify-content-center mt-3">
    {{ $items->links() }}
  </div>
  <x-items.create-modal id="createModal"/>
</x-layout.main>
