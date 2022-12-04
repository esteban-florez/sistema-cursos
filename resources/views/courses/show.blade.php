<x-layout.main title="Curso de {{ Str::title($course->name) }}">
  @push ('css')
    <link rel="stylesheet" href="{{ asset('css/detalles-curso.css') }}">
  @endpush
  <!-- TODO -> Terminar de pasar los datos y hacer las cards como un componente -->

  <section class="container-fluid details-grid mt-3">
    <div class="card">
      <img src="{{ asset($course->image) }}" class="w-100 img-fluid img-course rounded elevation-1" alt="Imagen del curso">
      <div class="card-header">
        <h2>Información del curso</h2>
        <span>Incripciones: {{ $course->start_ins }} al {{ $course->end_ins }}</span>
      </div>
      <div class="card-body">
        <p class="description">{{ Str::ucfirst($course->description) }}</p>
        <div class="border rounded d-flex flex-column p-3">
          <span class="mb-1"><b>Fechas de clases:</b> {{ $course->start_course }} al {{ $course->end_course }}</span>
          <span class="mb-1"><b>Hora:</b> {{ $course->start_time }} - {{ $course->end_time }}</span>
          <span class="mb-1"><b>Instructor:</b> {{ $course->instructor->full_name }}</span>
          <span class="mb-1"><b>Área:</b> {{ $course->area->name }}</span>
          <span class="mb-1"><b>Estudiantes:</b> 10 / {{ $course->student_limit }}</span>
        </div>
        <div class="d-flex justify-content-between text-success mt-3">
          <h3>Monto total</h3>
          <h3>{{ $course->total_price }}$</h3>
        </div>
        <div class="d-flex justify-content-between mt-3">
          <x-button url="#" class="btn-lg" color="secondary" icon="clipboard-list">Matrícula</x-button>
          <x-button url="{{ route('courses.edit', $course->id) }}" class="btn-lg" icon="edit">Editar</x-button>
        </div>
      </div>
    </div>  
  </section>
</x-layout.main>
