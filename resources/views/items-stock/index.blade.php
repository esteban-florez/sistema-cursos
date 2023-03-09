<x-layout.main title="Inventario actual">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('items.stock.index') }}
  </x-slot>
  <x-slot name="titleAddon">
    @can('create', App\Models\Operation::class)
      <x-button icon="plus" color="success" hide-text="sm" :url="route('operations.create')">
        Añadir
      </x-button>
    @endcan
    <x-button :url="route('pdf.items')" icon="file-download" color="secondary">
      Generar PDF
    </x-button>
  </x-slot>
  <x-select2 />
  <section class="container-fluid mt-3">
    <x-errors />
    <x-alert />
    @if ($items->isNotEmpty())
      <x-table>
        <x-slot name="header">
          <th>Código</th>
          <th>Artículo</th>
          <th>Stock disponible</th>
          <th>Stock total</th>
          <th>Acciones</th>
        </x-slot>
        <x-slot name="body">
          @foreach ($items as $item)
            <x-row :data="['#'.$item->code, $item->name, $item->stock, $item->total_stock]">
              <x-slot name="actions">
                @can('viewAny', App\Models\Operation::class)
                  <x-button icon="list" class="btn-sm"
                    :url="route('operations.index', ['filters|item_id' => $item])">
                    Ver operaciones
                  </x-button>
                @endcan
              </x-slot>  
            </x-row>
          @endforeach
        </x-slot>
        <x-slot name="pagination">
          <div class="pagination-container">
            {{ $items->links() }}
          </div>
        </x-slot>
      </x-table>
    @else
      <div class="empty-container">
        <h2 class="empty">No existen artículos registrados.</h2>
      </div>
    @endif
  </section>
</x-layout.main>
