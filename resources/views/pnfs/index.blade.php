<x-layout.main title="PNFs">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('pnfs.index') }}
  </x-slot>
  <x-layout.bar>
    <x-search placeholder="Buscar PNF..." :value="$search ?? ''" name="search" />
    @can('create', App\Models\PNF::class)
      <x-button icon="plus" color="success" hide-text="sm" :url="route('pnfs.create')">
        Añadir
      </x-button>
    @endcan
  </x-layout.bar>
  <section class="container-fluid">
    <x-alert />
    @if ($pnfs->isNotEmpty())
      <div class="row px-3 my-3" style="row-gap: 1rem;">
        @foreach ($pnfs as $pnf)
          <div class="col-sm-6 col-md-4 text-center">
            <div class="card mb-0 h-100">
              <div class="card-body">
                <h3 class="mb-1 text-truncate">{{ $pnf->name }}</h3>
                <p class="mb-0">Jefe del Departamento:</p>
                <p class="text-primary text-bold">{{ $pnf->leader }}</p>
                @can('update', $pnf)
                  <x-button :url="route('pnfs.edit', $pnf)" color="warning" icon="edit">
                    Editar
                  </x-button>
                @endcan
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @else
      <div class="empty-container">
        <h2 class="empty">No hay PNFs registrados.</h2>
      </div>
    @endif
  </section>
</x-layout.main>