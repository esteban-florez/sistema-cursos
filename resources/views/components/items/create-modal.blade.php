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
      <x-field name="code" id="code" type="number" placeholder="Ej. 12345" :value="old('code') ?? ''" minlength="1" maxlength="5" validNumber required>
        Bien Nacional:
      </x-field>
      <x-field name="name" id="name" placeholder="Ej. Balón de Fútbol" :value="old('name') ?? ''" minlength="4" maxlength="40" required>
        Nombre:
      </x-field>
      <x-textarea name="description" id="description" placeholder="Ej. Balón de cuero sintético" :content="old('description') ?? ''" minlength="6" maxlength="100" required>
        Descripción:
      </x-textarea>
      <x-button color="secondary" data-dismiss="modal" icon="times">Cancelar</x-button>
      <x-button color="success" type="submit" icon="check">Aceptar</x-button>
    </form>   
  @endcan
</x-modal>