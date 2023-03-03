<x-layout.main title="Clubes dictados">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('users.clubs.index', $user) }}
  </x-slot>
  <x-layout.bar>
    <x-search name="search" placeholder="Buscar club..." value="{{ $search }}"/>
  </x-layout.bar>
  <div class="container-fluid px-2">
    @if ($clubs->isNotEmpty())
      <div class="row px-sm-5" style="row-gap: 1rem;">
        @foreach ($clubs as $club)
          <div class="col-md-6">
            <x-club.alt-card :club="$club">
              <p class="mb-1">Nro de Miembros: <b>{{ $club->members_count }}</b></p>
              <p class="mb-1">Día de clases: <b>{{ $club->day }}</b></p>
              <p class="mb-1">Hora: <b>{{ $club->hour }}</b></p>
              <div class="d-flex align-items-center gap-1 mt-3">
                <x-button :url="route('clubs.show', $club->id)" icon="list-ul">
                  Detalles
                </x-button>
                @can('update', $club)
                  <x-button color="warning" :url="route('clubs.edit', $club)" icon="edit">
                    Editar
                  </x-button>
                @endcan
                <x-button color="secondary" :url="route('memberships.index', ['club' => $club->id])" icon="clipboard-list">
                  Miembros
                </x-button>
              </div>
            </x-club.alt-card>
          </div>
        @endforeach
      </div>
    @else
      <div class="empty-container">
        <div class="empty">No estas dictando clubes actualmente.</div>
      </div>
    @endif
  </div>
</x-layout.main>