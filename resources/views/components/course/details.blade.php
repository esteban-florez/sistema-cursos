@props(['course', 'enroll' => null])

@php
  // DRY
  $phasesColors = [
    'Pre-inscripciones' => 'dark',
    'Inscripciones' => 'info',
    'Pre-curso' => 'dark',
    'En curso' => 'success',
    'Finalizado' => 'danger',
    ];
  $phaseColor = $phasesColors[$course->phase];
  $registered = auth()->user()
    ->enrolledCourses
    ->contains($course);
@endphp

<section class="container-fluid mt-3">
  <div class="card">
    @if(!$enroll)
      <img src="{{ asset($course->image) }}" class="w-100 img-fluid details-img rounded elevation-1" alt="Imagen del curso">
    @endif
    <div class="card-header">
      <h2 class="mb-0">Información del curso</h2>
      @if(!$enroll)
        <h4 class="text-primary">Inscripciones: {{ $course->ins_date }}</h4>
      @endif
      @if($enroll)
        <h4 class="text-{{ $phaseColor }}">Fase actual: {{ $course->phase }}</h4>
      @endif
    </div>
    <div class="card-body">
      <p class="description">{{ $course->description }}</p>
      <div class="border rounded d-flex flex-column p-3">
        @if($enroll && $course->phase === 'Inscripciones')
          <span class="mb-1"><b>Fechas de inscripciones:</b> {{ $course->ins_date }}</span>
        @endif
        <span class="mb-1"><b>Fechas de clases:</b> {{ $course->date }}</span>
        <span class="mb-1"><b>Días de clases:</b> {{ $course->days_text }}.</span>
        <span class="mb-1"><b>Hora:</b> {{ $course->hours }}</span>
        <span class="mb-1"><b>Instructor:</b> {{ $course->instructor->full_name }}</span>
        <span class="mb-1"><b>Área:</b> {{ $course->area->name }}</span>
        <span class="mb-1"><b>Estudiantes:</b> {{ $course->students_count }} / {{ $course->student_limit }}</span>
      </div>
      <div class="d-flex justify-content-between text-success mt-3">
        <h3>Monto Total</h3>
        <h3>{{ $course->total_amount }}</h3>
      </div>
      @if($course->hasReserv())
      <div class="d-flex justify-content-between text-secondary">
        <h5 class="m-0">Monto de Reservación</h5>
        <h5 class="m-0">{{ $course->reserv_amount }}</h5>
      </div>
      @endif
      @if(!$enroll)
        <div class="d-flex justify-content-between align-items-center mt-3">
          @isnt('Estudiante')
            <x-button
              :url="route('enrollments.index', ['course' => $course->id])"
              class="btn-lg"
              color="secondary"
              icon="clipboard-list"
            >
              Matrícula
            </x-button>
            <x-button 
              :url="route('courses.edit', $course->id)"
              class="btn-lg"
              icon="edit"
            >
              Editar
            </x-button>
          @endis
          @is('Estudiante')
            <x-button 
              :url="route('available-courses.index')"
              color="secondary"
              icon="times"
            >
              Volver al listado
            </x-button>
            @if(!$registered)
              <x-button 
              :url="route('enrollments.create', ['course' => $course->id])"
              icon="clipboard-list"
              >
                Inscribirse
              </x-button>
            @else
              <p class="h5 m-0 text-primary">Ya estás inscrito en este curso.</p>
            @endif
          @endis
        </div>
      @endif
    </div>
  </div>  
</section>
