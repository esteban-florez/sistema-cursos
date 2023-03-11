<x-layout.main title="Registrar operación">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('operations.create') }}
  </x-slot>
  <section class="container-fluid px-2 px-sm-4 mt-3">
    <x-errors />
    <div class="create-box">
      <div class="card create-card card-dark">
        <div class="card-header">
          <h5 class="mb-0">Registrar nueva operación</h5>
        </div>
        <div class="card-body">
          @can('create', App\Models\Operation::class)
            <form method="POST" action="{{ route('operations.store') }}">
              @csrf
              <p class="font-italic">
                <b>Nota:</b> Los campos con <i class="fas fa-asterisk text-danger mx-1"></i> son obligatorios.
              </p>
              <x-select name="item_id" id="itemId" :options="$itemOptions" required>
                Artículo:
                @can('create', App\Models\Item::class)
                  <x-slot name="extra">
                    <a class="mt-1 ml-1" href="#" data-toggle="modal" data-target="#createItemModal">Registrar nuevo artículo</a>
                  </x-slot>
                @endcan
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
          @endcan
        </div>
      </div>
    </div>
  </section>
</x-layout.main>
<x-items.create-modal />