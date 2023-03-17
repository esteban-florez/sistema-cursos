<x-layout.main title="Mis clubes">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('users.memberships.index', $user) }}
  </x-slot>
  <x-layout.bar>
    <x-search name="search" placeholder="Buscar club..." :value="$search" />
  </x-layout.bar>

  <section class="container-fluid px-3">
    <x-alert />
    @if ($memberships->isNotEmpty())
      <div class="row px-sm-5" style="row-gap: 1rem;">
        @foreach ($memberships as $membership)
          @php
            $club = $membership->club;
          @endphp
          <div class="col-md-6">
            <x-club.alt-card :club="$club">
              <p class="mb-1">Día de clases: <b>{{ $club->day }}</b></p>
              <p class="mb-1">Hora: <b>{{ $club->hour }}</b></p>
              <div class="d-flex align-items-center gap-1 mt-3">
                @can('users.memberships.view', $membership)
                  <x-button :url="route('users.memberships.show', $membership)" icon="list-ul">
                    Detalles
                  </x-button>
                @endcan
                @can('delete', $membership)
                  <x-button color="danger" data-toggle="modal" data-target="#clubModal">
                    Retirarse
                  </x-button>
                  <x-club.modal 
                    :club="$club" 
                    :membership="$membership"
                  />
                @endcan
              </div>
            </x-club.alt-card>
          </div>
        @endforeach
      </div>
    @else
      <div class="empty-container flex-column">
        <h2 class="empty">No te has unido a ningún club</h2>
        @can('role', 'Estudiante')
          <a class="text-primary" href="{{ route('available-clubs.index') }}">
            Ver clubes disponibles
          </a>
        @endcan
      </div>
    @endif
  </section>
</x-layout.main>