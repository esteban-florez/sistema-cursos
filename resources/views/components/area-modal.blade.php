<x-modal :id="$id">
  <x-slot name="header">
    <h4 class="modal-title">Registrar área de formación</h4>
    <button type="button" class="close" data-dismiss="modal">
      <span>&times;</span>
    </button>
  </x-slot>
  <form method="POST" action="{{ route('areas.store') }}">
    @csrf
    <x-field name="name" id="name" placeholder="Escribe el nombre del área" required>
      Nombre:
    </x-field>
    <x-field type="checkbox" name="is_pnf" id="isPnf">
      ¿Se corresponde a un PNF?
    </x-field>
    <x-field name="pnf_name" id="pnfName" placeholder="Escribe el nombre del PNF..." disabled>
      Nombre del PNF:
    </x-field>
    <x-button color="secondary" data-dismiss="modal" icon="times">Cancelar</x-button>
    <x-button color="success" type="submit" icon="check">Aceptar</x-button>
  </form>
</x-modal>