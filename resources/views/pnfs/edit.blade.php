<x-layout.main title="Editar PNF o Departamento">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('pnfs.edit', $pnf) }}
  </x-slot>
  <section class="container-fluid">
    <div class="row justify-content-center">
      <div class="card col-md-6 mt-3">
        <div class="card-body">
          <form method="POST" action="{{ route('pnfs.update', $pnf) }}">
            @method('PUT')
            @csrf
            <h3>Editar PNF o Departamento</h3>
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
        </div>
      </div>
    </div>
  </section>
</x-layout.main>