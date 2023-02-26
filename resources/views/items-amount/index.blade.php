<x-layout.main title="Inventario actual">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('items.amount.index') }}
  </x-slot>
  <x-select2 />
  <section class="container-fluid mt-3">
    <x-errors />
    <x-alert />
    <div class="row">
      <div class="col-md-7">
        @if ($items->isNotEmpty())
          <x-table>
            <x-slot name="header">
              <th>Código</th>
              <th>Artículo</th>
              <th>Stock</th>
              <th>Acciones</th>
            </x-slot>
            <x-slot name="body">
              @foreach ($items as $item)
                <x-row :data="['#'.$item->code, $item->name, $item->stock]">
                  <x-slot name="extraActions">
                    <x-button icon="list" class="btn-sm"
                      :url="route('operations.index', ['filters|item_id' => $item->id])">
                      Ver operaciones
                    </x-button>
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
      </div>
      <div class="col-md-5">
        <div class="card card-dark w-100">
          <div class="card-header">
            <h5 class="mb-0">Registrar nueva operación</h5>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('operations.store') }}">
              @csrf
              <p class="font-italic">
                <b>Nota:</b> Los campos con <i class="fas fa-asterisk text-danger mx-1"></i> son obligatorios.
              </p>
              <x-select name="item_id" id="itemId" :options="$itemOptions" required>
                Artículo:
                <x-slot name="extra">
                  <a class="mt-1 ml-1" href="#" data-toggle="modal" data-target="#createItemModal">Registrar nuevo artículo</a>
                </x-slot>
              </x-select>
              <x-select name="type" id="type" :options="operationTypes()->pairs()" required>
                Tipo de operación:
              </x-select>
              <x-field name="amount" type="number" placeholder="Ej. 15" :value="old('amount') ?? ''" required>
                Cantidad: 
              </x-field>
              <x-field name="reason" placeholder="Ej. Desgaste por uso" :value="old('reason') ?? ''">
                Descripción:
              </x-field>
              <x-button color="success" icon="check" type="submit">
                Aceptar 
              </x-button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</x-layout.main>
<x-items.create-modal />