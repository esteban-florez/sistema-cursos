<x-layout.main title="Inventario actual">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('items.stock.index') }}
  </x-slot>
  @push('css')
    <link rel="stylesheet" href="{{ asset('css/listados.css') }}">
  @endpush
  <x-select2 />
  <section class="container-fluid mt-3">
    <x-errors />
    <x-alert />
    <div class="card mx-2 mb-0 list-top">
      <div class="w-100 d-flex justify-content-between align-items-center">
        <h3>Stock de artículos</h3>
        <div>
          @can('create', App\Models\Loan::class)
            <x-button icon="hand-holding" class="md" color="info" hide-text="sm"
              data-target="#createLoanModal" data-toggle="modal">
              Préstamos
            </x-button>
          @endcan
          @can('create', App\Models\Operation::class)
            <x-button icon="plus" color="success" hide-text="sm" :url="route('operations.create')">
              Nueva operación
            </x-button>
          @endcan
          @can('role', 'Administrador')
            <x-button :url="route('pdf.items')" icon="file-download" color="secondary">
              Generar PDF
            </x-button>
          @endcan
        </div>
      </div>
    </div>
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
      <div class="card mx-2 empty-container">
        <h5 class="empty">No existen artículos registrados.</h5>
      </div>
    @endif
  </section>
  @can('create', App\Models\Loan::class)
    <x-loan.modal :clubs="$clubs" />
  @endcan
</x-layout.main>