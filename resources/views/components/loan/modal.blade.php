@push('js')
  <script defer src="{{ asset('js/max-items.js') }}"></script>
@endpush

<x-modal id="createLoanModal">
  <div id="serialized" data-items="{{ json_encode($stock) }}"></div>
  <x-slot name="header">
    <h4 class="modal-title">Registrar préstamo</h4>
    <button type="button" class="close" data-dismiss="modal">
      <span class="text-white">&times;</span>
    </button>
  </x-slot>
  <p>Los campos con <i class="fas fa-asterisk text-danger"></i> son obligatorios.</p>
  @can('create', App\Models\Loan::class)
    <form method="POST" action="{{ route('loans.store') }}">
      @csrf
      <x-select name="item_id" id="itemId" :options="$items" :selected="old('item_id') ?? $loan->item_id ?? null" required>
        Artículo:
      </x-select>
      <x-select name="club_id" id="clubId" :options="$clubs" :selected="old('club_id') ?? $loan->club_id ?? null" required>
        Club:
      </x-select>
      <div class="d-flex flex-column mb-3">
        <x-field name="amount" type="number" placeholder="Ej. 15" :value="old('amount') ?? ''" minlength="1" maxlength="5" validNumber required>
          Cantidad: 
        </x-field>
        <p id="maxAmount" class="mb-0" style="margin-top: -0.8rem; margin-left: 0.2rem;">
        </p>
      </div>
      <x-button color="secondary" data-dismiss="modal" icon="times">Cancelar</x-button>
      <x-button color="success" type="submit" icon="check">Aceptar</x-button>
    </form>
  @endcan
</x-modal>