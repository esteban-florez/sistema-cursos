<x-layout.main title="{{ $course->name }}">
  @push ('css')
    <link rel="stylesheet" href="{{ asset('css/detalles.css') }}">
  @endpush
  {{-- TODO -> esto es simplemente un copia con un par de cambios, realmente deberíamos tener esto como un componente que se pueda usar tanto aqui como en "courses.show" --}}
  <x-course.details
    :course="$course"
  />
</x-layout.main>