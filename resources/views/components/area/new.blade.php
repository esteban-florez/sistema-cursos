@props(['id', 'pnfs', 'ajax' => false])

@if($ajax)
  @push('js')
    <script defer type="module" src="{{ asset('js/ajax.js') }}"></script>
    {{-- maybe some day, petite-vue? or alpinejs? XD --}}
  @endpush
@endif

<x-modal :id="$id">
  <x-slot name="header">
    <h4 class="modal-title">Registrar área de formación</h4>
    <button type="button" class="close" data-dismiss="modal">
      <span class="text-white">&times;</span>
    </button>
  </x-slot>
  <p>Los campos con <i class="fas fa-asterisk text-danger"></i> son obligatorios.</p>
    <form method="POST" action="{{ route('areas.store') }}" id="areaForm" data-url="{{ route('api.areas.store') }}" data-options="{{ route('api.areas.index') }}">
    @csrf
    <x-field :name="$ajax ? 'area_name' : 'name'" :id="$ajax ? 'areaName' : 'name'" placeholder="Escribe el nombre del área" autocomplete="off" required>
      Nombre:
    </x-field>
    <x-select name="pnf_id" id="pnfId" :options="$pnfs" required>
      PNF:
    </x-select>
    <x-button color="secondary" data-dismiss="modal" icon="times">Cancelar</x-button>
    <x-button color="success" type="submit" icon="check">Aceptar</x-button>
  </form>
</x-modal>