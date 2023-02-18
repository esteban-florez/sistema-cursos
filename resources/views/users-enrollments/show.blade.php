<x-layout.main :title="$enrollment->course->name">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('enrollments.show', $enrollment) }}
  </x-slot>
  @push ('css')
    <link rel="stylesheet" href="{{ asset('css/mis-cursos.css') }}">
  @endpush

  @php
    $course = $enrollment->course;
  @endphp

  <div class="container-fluid px-2 px-lg-4">
    <div class="row w-100">
      <div class="col-12">
        <img src="{{ asset($enrollment->course->image) }}" class="details-img rounded elevation-2" alt="Imagen del curso: {{ $enrollment->course->name }}">
      </div>
      <div class="col-lg-6 p-0">
        <x-course.details
          :course="$course"
          enroll
        />
      </div>
      <div class="col-12 col-lg-6">
        <div class="row">
          <div class="col-md-6 col-lg-12 mt-3">
            <div class="card">
              <div class="h4">Descargas</div>
              {{-- TODO: terminarlo --}}
              <div class="d-flex">
                <x-button color="success" url="#">Planilla de Inscripción</x-button>
                <x-button color="secondary" url="#" class="mx-2">Certificado</x-button>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-12 mt-3">
            <div class="card">
              {{-- TODO: Que se muestren los pagos --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-layout.main>