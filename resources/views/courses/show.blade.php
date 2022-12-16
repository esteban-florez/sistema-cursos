<x-layout.main title="{{ $course->name }}">
  @push ('css')
    <link rel="stylesheet" href="{{ asset('css/detalles.css') }}">
  @endpush
  <!-- TODO -> Terminar de pasar los datos y hacer las cards como un componente -->
  <x-course.details
    :course="$course"
  />
</x-layout.main>
