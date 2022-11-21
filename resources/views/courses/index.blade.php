<x-layout.main title="Cursos">
  @push('css')
    <link rel="stylesheet" href="{{ asset('css/cursos-user.css') }}">
  @endpush
  <section class="container-fluid">
    @forelse($courses as $course)
    <div class="courses-grid">
      <div class="card">
        <div class="row no-gutters">
          <div class="col-sm-5">
            <img class="w-100" src="/img/{{ $course->image }}" alt="Imagen del curso">
          </div>
          <div class="col-sm-7 d-flex align-items-center">
            <div class="card-body">
              <h5 class="mb-2">{{ Str::ucfirst($course->name) }}</h5>
              <p class="card-text">{{ Str::ucfirst($course->description) }}</p>
              <div class="d-flex justify-content-between align-items-center">
                <x-button url="{{ route('courses.index') }}">Detalles</x-button>
                <h4 class="text-success mb-0">{{ $course->total_price }} $</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @empty
      <div class="contenedor">
        <h2 class="coursent">No hay cursos disponibles</h2>
      </div>
    @endforelse
  </section>
</x-layout.main>