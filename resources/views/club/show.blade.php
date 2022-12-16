<x-layout.main title="Curso de {{ Str::title($club->name) }}">
  @push ('css')
    <link rel="stylesheet" href="{{ asset('css/detalles.css') }}">
  @endpush

  <section class="container-fluid details-grid mt-3">
    <div class="card">
      <img src="{{ asset($club->image) }}" class="w-100 img-fluid img-club rounded elevation-1" alt="Imagen del club">
      <div class="card-header">
        <h2>Información del club</h2>
      </div>
      <div class="card-body">
        <p class="description">{{ Str::ucfirst($club->description) }}</p>
        <div class="border rounded d-flex flex-column p-3">
          <span class="mb-1"><b>Día de clases:</b> {{ $club->day }}</span>
          <span class="mb-1"><b>Hora:</b> {{ $club->start_hour }} - {{ $club->end_hour }}</span>
          <span class="mb-1"><b>Instructor:</b> {{ $club->instructor->full_name }}</span>
        </div>
        <div class="d-flex justify-content-between mt-3">
          <x-button url="#" class="btn-lg" color="secondary" icon="clipboard-list">Miembros</x-button>
          <x-button url="{{ route('club.edit', $club->id) }}" class="btn-lg" icon="edit">Editar</x-button>
        </div>
      </div>
    </div>  
  </section>
</x-layout.main>