<x-layout.main title="PNFs y Departamentos">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('pnfs.index') }}
  </x-slot>
  <x-slot name="titleAddon">
    <x-button icon="plus" color="success" hide-text="sm" data-target="#createPnfModal" data-toggle="modal">
      Añadir
    </x-button>
  </x-slot>
  <section class="container-fluid">
    <x-alert />
    @if ($pnfs->isNotEmpty())
      <div class="row px-3 my-3" style="row-gap: 1rem;">
        @foreach ($pnfs as $pnf)
          <div class="col-sm-6 col-md-4 text-center">
            <div class="card mb-0 h-100">
              <div class="card-body">
                <h3 class="mb-1 text-truncate">{{ $pnf->name }}</h3>
                <x-button :url="route('pnfs.edit', $pnf)" color="warning" icon="edit">
                  Editar
                </x-button>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @else
      <div class="empty-container">
        <h2 class="empty">No hay PNFs o Departamentos registrados.</h2>
      </div>
    @endif
  </section>
  <x-pnf.create-modal id="createPnfModal" />
</x-layout.main>