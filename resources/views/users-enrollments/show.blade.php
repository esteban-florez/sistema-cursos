<x-layout.main :title="$course->name">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('users.enrollments.show', $enrollment) }}
  </x-slot>
  @push ('css')
    <link rel="stylesheet" href="{{ asset('css/detalles.css') }}">
  @endpush
  @push('js')
    <script type="module" src="{{ asset('js/payments/editPaymentStatus.js') }}"></script>
  @endpush

  <div class="container-fluid px-3 px-lg-4">
    <div class="row">
      <div class="col-12">
        <img src="{{ asset($course->image) }}" class="details-img rounded elevation-2" alt="Imagen del curso: {{ $course->name }}">
      </div>
      <div class="col-lg-6 p-0">
        <x-course.details
          :course="$course"
          no-image
        />
      </div>
      <div class="col-12 col-lg-6">
        <div class="card card-dark mt-lg-3">
          <div class="card-header">
            <h4 class="mb-0">Descargas del curso</h4>
          </div>
          <div class="card-body pt-3">
            @can('pdf.enrollment', $enrollment)
              <div class="card-text text-justify mb-3">Para formalizar su inscripción debe descargar la Planilla de Inscripción haciendo click en el botón de abajo, y llevarla hasta la sede de la universidad.</div>
              <x-button color="success" :url="route('pdf.enrollment', $enrollment)" icon="file-download" class="btn-block mt-2">
                Planilla de Inscripción
              </x-button>
            @endcan
            @can('pdf.certificate', $enrollment)
              <div class="card-text text-justify p-2">Felicitaciones por su excelente trabajo. Descargue el certificado haciendo click en el botón de abajo, y llevarlo hasta la sede de la universidad.</div>
              <x-button color="secondary" :url="route('pdf.certificate', $enrollment)" icon="download" class="btn-block mt-2">
                Certificado
              </x-button>
            @endcan
            @if (
              (!auth()->user()->can('pdf.enrollment', $enrollment))
              && (!auth()->user()->can('pdf.certificate', $enrollment))
            )
              <div class="empty-container">
                <h2 class="empty">No hay descargas pendientes</h2>
              </div>
            @endif
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h4 class="mb-0">Pagos</h4>
          </div>
          <div class="card-body">
            @if ($payments->isNotEmpty())
              <div class="payments-grid">
                @foreach ($payments as $payment)
                  <x-payment.card :payment="$payment"/>
                @endforeach
              </div>
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
</x-layout.main>
