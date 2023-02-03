<x-layout.main :title="$club->name">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('clubs.show', $club) }}
  </x-slot>
  @push ('css')
    <link rel="stylesheet" href="{{ asset('css/detalles.css') }}">
  @endpush

  <section class="container-fluid details-grid mt-3">
    {{-- DRY --}}
    <div class="card">
      <img src="{{ asset($club->image) }}" class="w-100 img-fluid details-img rounded elevation-1" alt="Imagen del club">
      <div class="card-header">
        <h2>Información del club</h2>
      </div>
      <div class="card-body">
        <p class="description">{{ str($club->description)->ucfirst() }}</p>
        <div class="border rounded d-flex flex-column p-3">
          <span class="mb-1"><b>Día de clases:</b> {{ $club->day }}</span>
          <span class="mb-1"><b>Hora:</b> {{ $club->hour }}</span>
          <span class="mb-1"><b>Instructor:</b> {{ $club->instructor->full_name }}</span>
        </div>
        <div class="d-flex justify-content-between mt-3">
          <x-button url="#" class="btn-lg" color="secondary" icon="clipboard-list">Miembros</x-button>
          <x-button url="{{ route('clubs.edit', $club->id) }}" class="btn-lg" icon="edit">Editar</x-button>
        </div>
      </div>
    </div>  
  </section>
</x-layout.main>