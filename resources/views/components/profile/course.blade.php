@props(['enrollment'])
@php
  // DRY
  $course = $enrollment->course;
  $approvalColors = [
      'Aprobado' => 'success',
      'Reprobado' => 'danger',
      'Por decidir' => 'secondary'
    ];
  $approvalColor = $approvalColors[$enrollment->approval];
@endphp
<x-profile.card>
  <x-slot name="image">
    <img class="img-fluid w-100 rounded-left img"
      src="{{ asset($course->image) }}"
      alt="imagen del Curso: {{ $course->name }}" />
  </x-slot>
  <x-slot name="body">
    <h4 class="mb-0">{{ $course->name }}</h4>
    <h6 class="text-{{ $approvalColor }}">Aprobación: {{ $enrollment->approval }}</h6>
    <p class="card-text">{{ $course->excerpt }}</p>
    <div class="d-flex align-items-center">
      @if ($enrollment->approval === 'Aprobado' && $enrollment->solvency === 'Solvente')
        <x-button icon="arrow-down" :url="route('certificate-pdf', $enrollment->id)" color="success">
          Certificado
        </x-button>
      @endif
      <x-button icon="list" :url="route('courses.show', $course->id)">Detalles</x-button>
    </div>
  </x-slot>
</x-profile.card>