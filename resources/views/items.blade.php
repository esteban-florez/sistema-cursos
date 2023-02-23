<x-layout.main title="Artículos">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('items.index') }}
  </x-slot>
  <section class="container-fluid">
    @if ($items->isNotEmpty())
      <div class="row px-1 mt-2">
        @foreach ($items as $item)
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <h4>{{ $item->name }}</h4>
                <h6 class="card-subtitle mb-2 text-muted">Código: #{{ $item->code }}</h5>
                <p class="card-text">{{ $item->description }}</p>
                <x-button url="#" icon="list">
                  Operaciones
                </x-button>
                <x-button color="warning" icon="edit">
                  Editar
                </x-button>
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
</x-layout.main>