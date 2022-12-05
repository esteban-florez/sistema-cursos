@props(['course', 'students'])

@php
  $badgeColors = [
    'Pre-inscripciones' => 'dark',
    'Inscripciones' => 'info',
    'Pre-curso' => 'dark',
    'En curso' => 'primary',
    'Finalizado' => 'danger',
  ]; 
@endphp

<div class="title-wrapper">
  <h2 class="h3 mb-0 mr-3 text-break">{{ $course->name }}</h2>
  <p class="m-0 h5">
    {{ $students->count() ?? '0' }} / {{ $course->student_limit }} estudiantes
  </p>
</div>
<div class="d-flex align-items-center gap-3">
  <span class="h5 m-0">Estado: </span>
  <span class="badge badge-{{ $badgeColors[$course->status] }} badge-4">
    {{ $course->status }}
  </span>
</div>