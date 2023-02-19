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
<x-profile.card :image="asset($course->image)" alt="Imagen del Curso: {{ $course->name }}">
  <h5 class="mb-0">{{ $course->name }}</h5>
  <div class="badge badge-{{ $approvalColor }} mb-2">{{ $enrollment->approval }}</div>
  <p class="card-text">{{ $course->excerpt }}</p>
  <div class="d-flex align-items-center gap-1">
    @if ($enrollment->approval === 'Aprobado' && $enrollment->solvency === 'Solvente')
      <x-button icon="arrow-down" :url="route('certificate-pdf', $enrollment->id)" color="success">
        Certificado
      </x-button>
    @endif
    <x-button icon="list" :url="route('courses.show', $course->id)">Detalles</x-button>
  </div>
</x-profile.card>