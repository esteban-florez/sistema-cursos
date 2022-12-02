@props(['id', 'area' => null])

<x-modal :id="$id">
  <x-slot name="header">
    <h4 class="modal-title">Editar área de formación</h4>
    <a href="{{ route('areas.index') }}">
      <button type="button" class="close">
        <span class="text-white">&times;</span>
      </button>
    </a>
  </x-slot>
  <p>Los campos con <i class="fas fa-asterisk text-danger"></i> son obligatorios.</p>
    <form method="POST" action="{{ route('areas.update', $area->id) }}">
    @csrf
    @method('PUT')
    <x-field :value="$area->name" name="name" id="name" placeholder="Escribe el nombre del área" required>
      Nombre:
    </x-field>
    <x-field :checked="!!$area->is_pnf" type="checkbox" name="is_pnf" id="isPnf">
      ¿Se corresponde a un PNF?
    </x-field>
    <x-field :value="$area->is_pnf ? $area->pnf_name : ''" name="pnf_name" id="pnfName" placeholder="Escribe el nombre del PNF..." :disabled="!$area->is_pnf">
      Nombre del PNF:
    </x-field>
    <x-button color="secondary" :url="route('areas.index')" icon="times">Cancelar</x-button>
    <x-button color="success" type="submit" icon="check">Aceptar</x-button>
  </form>
</x-modal>