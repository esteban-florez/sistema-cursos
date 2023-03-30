<section class="container-fluid">
  <form method="POST" action="{{ route('pnfs.store') }}">
    @csrf
    <h3>Añadir PNF o Departamento</h3>
    <p class="font-italic">
      <b>Nota:</b> Los campos con <i class="fas fa-asterisk text-danger mx-1"></i> son obligatorios.
    </p>
    <x-field name="name" placeholder="Ej. Informática" :value="old('name') ?? $pnf->name ?? ''" minlength="5" maxlength="50" required>
      Nombre: 
    </x-field>
    <x-button color="secondary" icon="times" :url="route('pnfs.index')">
      Cancelar
    </x-button>
    <x-button color="success" icon="check" type="submit">
      Aceptar 
    </x-button>
  </form>
</section>