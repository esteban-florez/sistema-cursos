<x-layout.main title="Artículos">
  @push('js')
    <script type="module" src="{{ asset('js/items.js') }}"></script>
  @endpush
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('items.index') }}
  </x-slot>
  @can('create', App\Models\Item::class)
    <x-slot name="titleAddon">
      <x-button color="success" icon="plus" id="addItem" data-toggle="modal" data-target="#createItemModal">
        Añadir
      </x-button>
    </x-slot>
  @endcan
  <x-errors />
  <section class="container-fluid">
    @if ($items->isNotEmpty())
      <div class="row mt-2" style="row-gap: 1rem;">
        @foreach ($items as $item)
          <div class="col-md-4 d-flex">
            <div class="card h-100 mb-0">
              <div class="card-body d-flex flex-column align-items-center justify-content-center">
                <h4>{{ $item->name }}</h4>
                <h6 class="card-subtitle mb-2 text-muted">BN: {{ $item->code }}</h5>
                <p class="card-text">{{ $item->description }}</p>
                <div class="align-self-start">
                  <x-button :url="route('operations.index', ['filters|item_id' => $item])" icon="list">
                    Operaciones
                  </x-button>
                  @can('update', $item)
                    <x-button :url="route('items.edit', $item)" color="warning" icon="edit">
                      Editar
                    </x-button>
                  @endcan
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
  @can('create', App\Models\Item::class)
    <x-items.create-modal id="createItemModal"/>     
  @endcan
</x-layout.main>
