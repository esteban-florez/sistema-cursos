<x-modal id="createItemModal">
  <x-slot name="header">
    <h4 class="modal-title">Registrar artículo</h4>
    <button type="button" class="close" data-dismiss="modal">
      <span class="text-white">&times;</span>
    </button>
  </x-slot>
  <p>Los campos con <i class="fas fa-asterisk text-danger"></i> son obligatorios.</p>
  @can('create', App\Models\Item::class)
    <form method="POST" action="{{ route('items.store') }}">
      @csrf
      <x-field name="name" id="name" placeholder="Ej. Balón de Fútbol" :value="old('name') ?? ''" required>
        Nombre:
      </x-field>
      <x-textarea name="description" id="description" placeholder="Ej. Balón de cuero sintético" :content="old('description') ?? ''" required>
        Descripción:
      </x-textarea>
      <x-button color="secondary" data-dismiss="modal" icon="times">Cancelar</x-button>
      <x-button color="success" type="submit" icon="check">Aceptar</x-button>
    </form>   
  @endcan
</x-modal>