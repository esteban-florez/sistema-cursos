<x-layout.main title="{{ $course->name }}">
  @push ('css')
    <link rel="stylesheet" href="{{ asset('css/detalles.css') }}">
  @endpush
  <x-course.details
    :course="$course"
  />
</x-layout.main>
