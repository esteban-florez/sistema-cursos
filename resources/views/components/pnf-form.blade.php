@props(['pnf' => null])

@php
  $action = $pnf ? route('pnfs.update', $pnf) : route('pnfs.store');
@endphp

<section class="container-fluid">
  <div class="row justify-content-center">
    <div class="card col-md-6 mt-3">
      <div class="card-body">
        <form method="POST" action="{{ $action }}">
          @csrf
          @if ($pnf)
            @method('PUT')
          @endif
          <h3>{{$pnf ? 'Editar' : 'Añadir'}} PNF</h3>
          <p class="font-italic">
            <b>Nota:</b> Los campos con <i class="fas fa-asterisk text-danger mx-1"></i> son obligatorios.
          </p>
          <x-field name="name" placeholder="Ej. Informática" :value="old('name') ?? $pnf->name ?? ''" required>
            Nombre: 
          </x-field>
          <x-field name="leader" placeholder="Ej. Luis Vargas" :value="old('leader') ?? $pnf->leader ?? ''" required>
            Jefe de Departamento:
          </x-field>
            @can('viewAny', App\Models\PNF::class)
              <x-button color="secondary" icon="times" :url="route('pnfs.index')">
                Cancelar
              </x-button>
            @endcan
          <x-button color="success" icon="check" type="submit">
            Aceptar 
          </x-button>
        </form>
      </div>
    </div>
  </div>
</section>