@props(['club', 'join' => false])

@php 
  $joined = auth()->user()
    ->joinedClubs
    ->contains($club);
@endphp

<section class="container-fluid details-grid mt-3">
  <div class="card">
    @if (!$join)
      <img src="{{ asset($club->image) }}" class="w-100 img-fluid details-img rounded elevation-1" alt="Imagen del club">
    @endif
    <div class="card-header">
      <h2>Información del club</h2>
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
        @isnt('Estudiante')
          <x-button 
            :url="route('memberships.index', ['club' => $club])" 
            class="btn-lg"
            color="secondary" 
            icon="clipboard-list"
          >
            Miembros
          </x-button>
          <x-button 
            :url="route('clubs.edit', $club)" 
            class="btn-lg"
            icon="edit"
          >
            Editar
          </x-button>
        @endis
        @if (!$join)
          @is('Estudiante')
            <x-button 
              :url="route('available-clubs.index')"
              class="btn-lg"
              color="secondary"
              icon="times"
            >
              Volver al listado
            </x-button>
            @if(!$joined)
              <x-button class="btn-lg" icon="clipboard-list" data-toggle="modal" data-target="#clubModal">
                Unirse
              </x-button>
              <x-club.modal 
                :club="$club"
              />
            @else
              <p class="h5 m-0 text-primary">Ya te uniste a este club.</p>
            @endif
          @endis
        @endif
      </div>
    </div>
  </div>  
</section>