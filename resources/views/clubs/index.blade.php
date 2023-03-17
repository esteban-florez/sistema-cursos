<x-layout.main title="Clubes">
  <x-select2/>
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('clubs.index') }}
  </x-slot>
  <x-layout.bar>
    <x-search 
      placeholder="Buscar club..." :value="$search" 
      name="search" :filters="$filters" :sort="$sort"/>
    <div>
      @can('viewAny', App\Models\Club::class)
        <x-button icon="plus" color="success" hide-text="sm" :url="route('clubs.create')">
          Añadir
        </x-button>
      @endcan
      <x-button icon="filter" hide-text="sm" data-target="#filtersCollapse" data-toggle="collapse">
        Filtros
      </x-button>
    </div>
    <x-slot name="filtersCollapse">
      <x-filters-collapse>
        <x-slot name="filters">
          <x-select
            :options="days()->pairs()"
            id="day"
            name="filters|day"
            :selected="$filters['day'] ?? null">
            Días:
          </x-select>
        </x-slot>
      </x-filters-collapse>
    </x-slot>
  </x-layout.bar>
  <section class="container-fluid">
    <x-alert />
    @if ($clubs->isNotEmpty())
      <x-table>
        <x-slot name="header">
          <th>Nombre</th>
          <th>Instructor</th>
          <th>Día</th>
          <th>Hora de Inicio</th>
          <th>Hora de Cierre</th>
          <th>Miembros</th>
          <th>Estado</th>
          <th>Acciones</th>
        </x-slot>
        <x-slot name="body">
          @foreach ($clubs as $club)
            <x-row :data="[
              $club->name,
              $club->instructor->full_name,
              $club->day,
              $club->start_hour->format(TF),
              $club->end_hour->format(TF),
              $club->members_count,
              $club->status,
              ]"
            >
              <x-slot name="actions">
                @can('update', $club)
                  <x-button class="btn-sm" color="warning" :url="route('clubs.edit', $club)" icon="edit">
                    Editar
                  </x-button>
                @endcan
                @can('role', 'Administrador')
                  @if($club->status === 'Activo')
                    <x-club.status-button :id="$club->id" value="Inactivo" sm/>
                  @else
                    <x-club.status-button :id="$club->id" value="Activo" sm/>
                  @endif
                @endcan
                <x-button class="btn-sm" :url="route('clubs.show', $club)" icon="eye">
                  Detalles
                </x-button>
              </x-slot>
            </x-row>
          @endforeach
        </x-slot>
        <x-slot name="pagination">
          <div class="pagination-container">
            {{ $clubs->links() }}
          </div>
        </x-slot>
      </x-table>
    @else
      <div class="empty-container">
        <h2 class="empty">No hay clubs disponibles</h2>
      </div>
    @endif
  </section>
</x-layout.main>