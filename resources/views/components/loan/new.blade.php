@props(['id' => 'itemLoanModal', 'items', 'clubs'])

<x-modal :id="$id">
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
      <x-field name="amount" type="number" placeholder="Ej. 15" :value="old('amount') ?? ''" required>
        Cantidad: 
      </x-field>
      <x-select name="item_id" id="itemId" :options="$items" :selected="old('item_id') ?? $loan->item_id ?? null" required>
        Artículo:
      </x-select>
      <x-select name="club_id" id="clubId" :options="$clubs" :selected="old('club_id') ?? $loan->club_id ?? null" required>
        Club:
      </x-select>
      <x-button color="secondary" data-dismiss="modal" icon="times">Cancelar</x-button>
      <x-button color="success" type="submit" icon="check">Aceptar</x-button>
    </form>
  @endcan
</x-modal>