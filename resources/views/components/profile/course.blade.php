@props(['course'])

<x-profile.card :image="asset($course->image)" alt="curso">
  <h5 class="mb-0">{{ $course->name }}</h5>
  <div class="badge badge-success mb-2">{{ $course->approved_at }}</div>
  <p class="card-text">{{ $course->excerpt }}</p>
  <div class="d-flex align-items-center gap-1">
    <x-button color="secondary">Certificado</x-button>
    <x-button url="{{ route('courses.show', $course->id) }}">Detalles</x-button>
  </div>
</x-profile.card>