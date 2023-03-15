<x-modal id="confirmationModal">
  <x-slot name="header">
    <h4 class="modal-title">Restaurar base de datos</h4>
    <button type="button" class="close" data-dismiss="modal">
      <span class="text-white">&times;</span>
    </button>
  </x-slot>
  <p class="alert alert-danger">
    ¿Seguro que deseas restaurar la base de datos? Se perderán todos los cambios hasta este respaldo.
  </p>
  <x-button color="danger" icon="times" data-dismiss="modal">
    Cancelar
  </x-button>
  <x-button color="success" icon="check" id="send">
    Aceptar
  </x-button>
</x-modal>