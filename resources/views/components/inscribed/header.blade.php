@props(['course', 'enrollments'])

@php
  $badgeColors = [
    'Pre-inscripciones' => 'dark',
    'Inscripciones' => 'info',
    'Pre-curso' => 'dark',
    'En curso' => 'success',
    'Finalizado' => 'danger',
  ]; 
@endphp

<div class="title-wrapper">
  <h2 class="h3 mb-0 mr-3 text-break">{{ $course->name }}</h2>
  <p class="m-0 h5">
    {{ $course->student_diff }} estudiantes
  </p>
</div>
<div class="d-flex align-items-center gap-3">
  <span class="h5 m-0">
    Fase: 
    <b class="h5 m-0 text-{{ $badgeColors[$course->phase] }} text-bold">
    {{ $course->phase }}
    </b>
  </span>
  
  <x-button icon="file-download" hide-text="md" :url="route('enrollments-pdf.index', ['course' => $course])">
    Generar PDF
  </x-button>
</div>