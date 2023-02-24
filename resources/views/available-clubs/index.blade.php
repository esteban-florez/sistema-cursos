<x-layout.main title="Clubes">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('available-clubs.index') }}
  </x-slot>
  @push('css')
    <link rel="stylesheet" href="{{ asset('css/clubes.css') }}">
  @endpush

  <x-layout.bar>
    <x-search placeholder="Buscar club..." :value="$search" name="search" autocomplete="off">
      <x-slot name="hidden">
        @foreach ($filters as $filter => $value)
          <input type="hidden" name="filters|{{ $filter }}" value="{{ $value }}">
        @endforeach
        <input type="hidden" name="sort" value="{{ $sort }}">
      </x-slot>
    </x-search>
    <x-button icon="filter" hide-text="sm" data-target="#filtersCollapse" data-toggle="collapse">
      Filtros
    </x-button>
    <x-slot name="filtersCollapse">
      <x-filters-collapse>
        <x-slot name="sorts">
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
  <section class="px-3">
    <x-alert />
    <div class="container-fluid clubs-grid mt-3">
      @forelse($clubs as $club)
        <x-club.card :club="$club">
          <p class="card-text">{{ $club->excerpt }}</p>
          <div class="d-flex align-items-center">
            <x-button :url="route('clubs.show', $club->id)">
              Detalles
            </x-button>
          </div>
        </x-club.card>
      @empty
        <div class="empty-container">
          <h2 class="empty">No hay clubes disponibles actualmente</h2>
        </div>
      @endforelse
    </div>
  </section>
</x-layout.main>