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
      @can('pdf.certificate', $enrollment)
        <x-button icon="arrow-down" :url="route('pdf.certificate', $enrollment)" color="success">
          Certificado
        </x-button>
      @endcan
      @can('users.memberships.view', $enrollment)
        <x-button icon="list" :url="route('users.enrollments.show', $enrollment)">
          Detalles
        </x-button>  
      @endcan
    </div>
  </x-slot>
</x-profile.card>