<x-layout.main title="Registrar operación">
  <x-select2/>
  @push('js')
    <script defer src="{{ asset('js/max-items.js') }}"></script>
  @endpush
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
          <div id="serialized" data-items={{ json_encode($items->stock) }}></div>
          @can('create', App\Models\Operation::class)
            <form method="POST" action="{{ route('operations.store') }}">
              @csrf
              <p class="font-italic">
                <b>Nota:</b> Los campos con <i class="fas fa-asterisk text-danger mx-1"></i> son obligatorios.
              </p>
              <x-select name="item_id" id="itemId" :options="$items->options" required>
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
              <div class="d-flex flex-column mb-3">
                <x-field name="amount" type="number" placeholder="Ej. 15" :value="old('amount') ?? ''" minlength="1" maxlength="5" validNumber required>
                  Cantidad: 
                </x-field>
                <p id="maxAmount" class="mb-0" style="margin-top: -0.8rem; margin-left: 0.2rem;">
                </p>
              </div>
              <x-textarea name="reason" placeholder="Ej. Desgaste por uso" :value="old('reason') ?? ''" minlength="6" maxlength="100">
                Descripción:
              </x-textarea>
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