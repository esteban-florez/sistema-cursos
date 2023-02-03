<x-layout.main title="Matrícula">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('enrollments.index', $course) }}
  </x-slot>
  @push('css')
    <link rel="stylesheet" href="{{ asset('css/listados.css') }}">
  @endpush
  {{-- IMPROVE -> 2 --}}
  <section class="content">
    <div class="container-fluid">
      <div class="card py-2 px-3 mb-0 list-top">
        <x-inscribed.header :course="$course" :enrollments="$enrollments"/>
      </div>
      <div class="card list-bottom">
        @if($course->phase === 'Pre-inscripciones' || $enrollments->total() === 0)
          <div class="alert alert-info mx-3 mt-3 d-flex align-items-center gap-2">
            <i class="fas fa-info-circle"></i>
            <p class="h5 m-0">Este curso aún no posee estudiantes matriculados.</p>
          </div>
        @else
          <x-inscribed.table :course="$course" :enrollments="$enrollments"/>
        @endif
      </div>
    </div>
  </section>
</x-layout.main>