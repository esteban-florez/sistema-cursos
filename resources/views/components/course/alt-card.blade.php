@props(['course', 'body' => null])

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
@endphp

<div class="card h-100 m-0">
  <div class="card-img-top">
    <img  
      class="w-100 img-cover"
      src="{{ asset($course->image) }}"
      alt="Imagen del Curso: {{$course->name }}"
      style="height: 10rem;">
  </div>
  <div class="card-header">
    <h4 class="mb-0">{{ $course->name }}</h4>
    <h6 class="mb-0 text-{{ $phaseColor }}">
      Fase actual: {{ $course->phase }}
    </h6>
  </div>
  <div class="card-body">
    {{ $slot }}
  </div>
</div>