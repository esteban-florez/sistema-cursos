<x-layout.main title="Matrícula">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('enrollments.index', $course) }}
  </x-slot>
  @push('css')
    <link rel="stylesheet" href="{{ asset('css/listados.css') }}">
  @endpush
  {{-- IMPROVE -> 2 --}}
  <x-alert/>
  <section class="container-fluid px-2">
    <div class="card mx-2 mb-0 list-top">
      <x-inscribed.header :course="$course" :enrollments="$enrollments"/>
    </div>
    <div class="list-bottom">
      @if($course->phase === 'Pre-inscripciones' || $enrollments->total() === 0)
        <div class="card mx-2 empty-container">
          <h5 class="empty">Este curso aún no posee estudiantes matriculados.</h5>
        </div>
      @else
        <x-inscribed.table :course="$course" :enrollments="$enrollments"/>
      @endif
    </div>
  </section>
</x-layout.main>