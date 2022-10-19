<x-modal :id="$id">
  <x-slot name="header">
    <h4 class="modal-title">Registrar área de formación</h4>
    <button type="button" class="close" data-dismiss="modal">
      <span>&times;</span>
    </button>
  </x-slot>
  <form method="POST" action="{{ route('areas.store') }}">
    @csrf
    <div class="mb-3">
      <label for="nameInput">Nombre: </label>
      <input class="form-control" type="text" name="name" id="nameInput"
        placeholder="Escribe el nombre del area...">
    </div>
    <div class="form-check mb-3">
      <input class="form-check-input" type="checkbox" name="is_pnf" id="isPnfCheckbox">
      <label class="form-check-label" for="isPnfCheckbox">¿Se corresponde a un PNF?</label>
    </div>
    <div class="mb-3">
      <label for="pnfNameInput">Nombre del PNF: </label>
      <input class="form-control" type="text" name="pnf_name" id="pnfNameInput"
        placeholder="Escribe el nombre del PNF..." disabled>
    </div>
    <x-button color="secondary" data-dismiss="modal" icon="times">Cancelar</x-button>
    <x-button color="success" type="submit" icon="check">Aceptar</x-button>
  </form>
</x-modal>