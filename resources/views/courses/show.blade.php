<x-layout.main title="Detalles de curso">
  @push ('css')
    <link rel="stylesheet" href="{{ asset('css/detalles-curso.css') }}">
  @endpush
  <!-- TODO -> Rediseñar la interfaz, ya no me convence como es :c -->
  <!-- TODO -> Terminar de pasar los datos y hacer las cards como un componente -->
  <section class="container-fluid mt-3">
    @foreach ($courses as $course)
    <div class="row no-gutters">
      <div class="col-md-5 px-2">
        <div class="card">
          <img src="{{ asset($course->image) }}" class="w-100 img-fluid img-course rounded elevation-1" alt="Imagen del curso">
          <div class="card-body">
            <div class="d-flex justify-content-between text-success">
              <h3>Precio Total</h3>
              <h3>{{ $course->total_price }}$</h3>
            </div>
            <div class="d-flex justify-content-between text-muted">
              <h5>Precio de inscripción</h5>
              <h5>{{ $course->price_ins }}$</h5>
            </div>
            <div class="d-flex justify-content-between mt-3">
              <x-button url="#" class="btn-lg" color="secondary" icon="clipboard-list">Matrícula</x-button>
              <x-button url="{{ route('courses.edit', $course->id) }}" class="btn-lg" icon="edit">Editar</x-button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-7 px-2">
        <div class="card card-info">
          <div class="card-header">
            <h2>Información del curso</h2>
            <span>Incripciones: {{ $course->start_ins }} al {{ $course->end_ins }}</span>
          </div>
          <div class="card-body">
            <p class="description">{{ $course->description }}</p>
            <div class="border rounded d-flex flex-column mt-3 p-3">
              <span class="mb-1"><b>Clases:</b> {{ $course->start_course }} al {{ $course->end_course }}</span>
              <span class="mb-1"><b>Hora:</b> {{ $course->start_time }} - {{ $course->end_time }}</span>
              <span class="mb-1"><b>Instructor:</b> {{ $course->instructor_id }}</span>
              <span class="mb-1"><b>Área:</b> {{ $course->area_id }}</span>
              <span class="mb-1"><b>Estudiantes:</b> 10 / {{ $course->student_limit }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </section>
</x-layout.main>