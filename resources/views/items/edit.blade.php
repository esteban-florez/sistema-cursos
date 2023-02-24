<x-layout.main title="Editar artículo">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('items.edit', $item) }}
  </x-slot>
  <section class="container-fluid">
    <div class="row justify-content-center">
      <div class="card col-md-6 mt-3">
        <div class="card-body">
          <form method="POST" action="{{ route('items.update', $item->id) }}">
            @csrf
            @method('PUT')
            <h3>Editar artículo</h3>
            <p class="font-italic">
              <b>Nota:</b> Los campos con <i class="fas fa-asterisk text-danger mx-1"></i> son obligatorios.
            </p>
            <x-field name="name" placeholder="Ej. Balón de Fútbol" :value="old('name') ?? $item->name ?? ''" required>
              Nombre: 
            </x-field>
            <x-textarea name="description" placeholder="Ej. Balón de fútbol sala de cuero..." :content="old('description') ?? $item->description ?? ''" required>
              Descripción:
            </x-textarea>
            <x-button color="secondary" icon="times" :url="route('items.index')">
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