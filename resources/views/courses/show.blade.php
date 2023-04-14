<x-layout.main :title="$course->name">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('courses.show', $course) }}
  </x-slot>
  @push ('css')
    <link rel="stylesheet" href="{{ asset('css/detalles.css') }}">
  @endpush
  <div class="details-grid">
    <x-course.details
      :course="$course"
    />
  </div>
</x-layout.main>
