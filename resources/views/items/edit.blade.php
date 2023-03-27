<x-layout.main title="Editar artículo">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('items.edit', $item) }}
  </x-slot>
  <section class="container-fluid">
    <div class="row justify-content-center">
      <div class="card col-md-6 mt-3">
        <div class="card-body">
          @can('update', $item)
            <form method="POST" action="{{ route('items.update', $item) }}">
              @csrf
              @method('PUT')
              <h3>Editar artículo</h3>
              <p class="font-italic">
                <b>Nota:</b> Los campos con <i class="fas fa-asterisk text-danger mx-1"></i> son obligatorios.
              </p>
              <x-field name="code" id="code" placeholder="Ej. 12345" :value="old('code') ?? $item->code ?? ''" minlength="1" maxlength="5" validNumber required>
                Código:
              </x-field>
              <x-field name="name" placeholder="Ej. Balón de Fútbol" :value="old('name') ?? $item->name ?? ''" minlength="4" maxlength="40" required>
                Nombre: 
              </x-field>
              <x-textarea name="description" placeholder="Ej. Balón de fútbol sala de cuero..." :content="old('description') ?? $item->description ?? ''" minlength="6" maxlength="100" required>
                Descripción:
              </x-textarea>
              @can('viewAny', App\Models\Item::class)
                <x-button color="secondary" icon="times" :url="route('items.index')">
                  Cancelar
                </x-button>
              @endcan
              <x-button color="success" icon="check" type="submit">
                Aceptar 
              </x-button>
            </form>
          @endcan
        </div>
      </div>
    </div>
  </section>
</x-layout.main>