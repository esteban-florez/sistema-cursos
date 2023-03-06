@props(['id', 'pnfs', 'area'])

<x-modal :id="$id">
  <x-slot name="header">
    <h4 class="modal-title">Editar área de formación</h4>
    @can('viewAny', App\Models\Area::class)
      <a href="{{ route('areas.index') }}">
        <button type="button" class="close">
          <span class="text-white">&times;</span>
        </button>
      </a>
    @endcan
  </x-slot>
  <p>Los campos con <i class="fas fa-asterisk text-danger"></i> son obligatorios.</p>
    @can('update', $area)
      <form method="POST" action="{{ route('areas.update', $area) }}">
        @csrf
        @method('PUT')
        <x-field :value="old('name') ?? $area->name ?? ''" name="name" id="name" placeholder="Escribe el nombre del área" required>
          Nombre:
        </x-field>
        <x-select name="pnf_id" id="pnfId" :options="$pnfs" :selected="old('pnf_id') ?? $area->pnf_id ?? null" required>
          PNF:
        </x-select>
        @can('viewAny', App\Models\Area::class)
          <x-button :url="route('areas.index')" color="secondary" icon="times">
            Cancelar
          </x-button>
        @endcan
        <x-button color="success" type="submit" icon="check">Aceptar</x-button>
      </form>
    @endcan
</x-modal>