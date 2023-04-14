@props(['course'])

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

<x-profile.card>
  <x-slot name="image">
    <img class="img-fluid w-100 rounded-left img"
      src="{{ asset($course->image) }}"
      alt="imagen del Curso: {{ $course->name }}" />
  </x-slot>
  <x-slot name="body">
    <h4 class="mb-0">{{ $course->name }}</h4>
    <h6 class="text-{{ $phaseColor }}">
      Fase actual: {{ $course->phase }}
    </h6>
    <p class="card-text">{{ $course->excerpt }}</p>
    <x-button :url="route('courses.show', $course)" icon="list-ul">
      Detalles
    </x-button>
  </x-slot>
</x-profile.card>