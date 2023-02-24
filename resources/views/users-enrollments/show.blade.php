<x-layout.main :title="$enrollment->course->name">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('enrollments.show', $enrollment) }}
  </x-slot>
  @push ('css')
    <link rel="stylesheet" href="{{ asset('css/detalles.css') }}">
  @endpush

  <div class="container-fluid px-3 px-lg-4">
    <div class="row">
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
        {{-- Deberia hacerlos componentes(? --}}
        <div class="row">
          <div class="col-md-6 col-lg-12 mt-lg-3 order-md-first">
            <div class="card card-dark">
              <div class="card-header">
                <h4 class="mb-0">Descargas del curso</h4>
              </div>
              <div class="card-body pt-3">
                @if ($course->phase === 'Inscripciones' && $enrollment->status === 'En reserva')
                  <div class="card-text text-justify mb-3">Para formalizar su inscripción debe descargar la Planilla de Inscripción haciendo click en el botón de abajo, y llevarla hasta la sede de la UPTA en La Victoria.</div>
                  <x-button color="success" url="#" icon="file-download" class="btn-block mt-2">
                    Planilla de Inscripción
                  </x-button>
                @else
                  <div class="empty-container">
                    <h2 class="empty">No hay descargas pendientes</h2>
                  </div>
                @endif
                @if ($enrollment->approval === 'Aprobado' && $enrollment->solvency === 'Solvente')
                  <div class="card-text text-justify p-2">Felicitaciones por su excelente trabajo. Descargue el certificado haciendo click en el botón de abajo, y llevarlo hasta la sede de la UPTA en La Victoria.</div>
                  <x-button color="secondary" url="#" icon="download" class="btn-block mt-2">
                    Certificado
                  </x-button>
                @endif
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-12">
            <div class="card">
              <div class="card-header">
                <h4 class="mb-0">Pagos</h4>
              </div>
              <div class="card-body">
                {{-- Toca esperar a cambiar la card de pagos user --}}
                @if ($payments->isNotEmpty())
                  @foreach ($payments as $payment)
                    <x-payment.alt-card :payment="$payment"/>
                  @endforeach
                @else
                  <div class="empty-container">
                    <h2 class="empty">Actualmente no tienes pagos registrados</h2>
                  </div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-layout.main>