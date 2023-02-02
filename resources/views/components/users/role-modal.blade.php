<x-modal id="roleModal">
  <x-slot name="header">
    <h4 class="modal-title">Editar rol del usuario</h4>
    <button data-dismiss="modal" type="button" class="close">
      <span class="text-white">&times;</span>
    </button>
  </x-slot>
    <form method="POST" action="{{ route('users.role.update', '__id__') }}">
    @csrf
    @method('PATCH')
    <p>
      Nombre: <b id="userName"></b>
    </p>
    <x-select name="role" id="modalRoleSelect" :options="roles()->pairs()" :selected="old('role') ?? null" required>
      Rol:
    </x-select>
    <x-button color="secondary" icon="times" data-dismiss="modal">Cancelar</x-button>
    <x-button color="success" type="submit" icon="check">Aceptar</x-button>
  </form>
</x-modal>