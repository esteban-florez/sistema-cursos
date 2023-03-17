@props(['club', 'noImage' => false])

@php 
  $user = auth()->user();
  $joined = $user
    ->joinedClubs
    ->contains($club);
  $statusColor = [
    'Activo' => 'success', 
    'Inactivo' => 'secondary', 
  ];
  $statusColor = $statusColor[$club->status];
@endphp

<section class="container-fluid details-grid mt-3">
  <div class="card">
    @if (!$noImage)
      <img src="{{ asset($club->image) }}" class="w-100 img-fluid details-img rounded elevation-1" alt="Imagen del club">
    @endif
    <div class="card-header">
      <h2 class="mb-0">Información del club</h2>
      <h5 class="text-{{ $statusColor }}">
        Estado actual: {{ $club->status }}
      </h5>
    </div>
    <div class="card-body">
      <p class="description">{{ str($club->description)->ucfirst() }}</p>
      <div class="border rounded d-flex flex-column p-3">
        <span class="mb-1"><b>Día de clases:</b> {{ $club->day }}</span>
        <span class="mb-1"><b>Hora:</b> {{ $club->hour }}</span>
        <span class="mb-1"><b>Instructor:</b> {{ $club->instructor->full_name }}</span>
        <span class="mb-1"><b>Miembros:</b> {{ $club->members_count }}</span>
      </div>
      <div class="d-flex justify-content-between align-items-center mt-3">
        @can('role', ['Administrador', 'Instructor'])
          <div class="d-flex gap-2">
            @can('viewAny', [App\Model\Membership::class, $club])
              <x-button 
                :url="route('memberships.index', ['club' => $club])" 
                color="secondary" 
                icon="clipboard-list"
              >
                Miembros
              </x-button>
            @endcan
            @can('clubs.loans.viewAny', $club)
              <x-button color="info" :url="route('clubs.loans.index', ['club' => $club])" icon="hand-holding">
                Préstamos
              </x-button>
            @endcan
          </div>
        @endcan
        @can('update', $club)
          <x-button 
            :url="route('clubs.edit', $club)" 
            icon="edit"
            color="warning"
          >
            Editar
          </x-button>
        @endcan
        @can('role', 'Estudiante')
          <x-button
            :url="route('available-clubs.index')"
            color="secondary"
            icon="times"
          >
            Volver al listado
          </x-button>
          @can('create', [App\Models\Membership::class, $club])
            <x-button icon="clipboard-list" data-toggle="modal" data-target="#clubModal">
              Unirse
            </x-button>
            <x-club.modal :club="$club" />
          @else
            <p class="h5 m-0 text-primary">Ya te uniste a este club.</p>
          @endcan
        @endcan
      </div>
    </div>
  </div>  
</section>