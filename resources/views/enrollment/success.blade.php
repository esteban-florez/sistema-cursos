<x-layout.main title="Inscripción en Curso">
  @push('css-plugins')
    <link rel="stylesheet" href="{{ asset('css/bs-stepper.min.css') }}">
  @endpush
  @push('css')
    <link rel="stylesheet" href="{{ asset('css/inscripcion.css') }}">
  @endpush
  @push('js-plugins')
    <script defer src="{{ asset('js/bs-stepper.min.js') }}"></script>
  @endpush
  @push('js')
    <script defer type="module" src="{{ asset('js/inscripcionjs/successStepper.js') }}"></script>  
    <script defer src="{{ asset('js/inscripcionjs/responsiveStepper.js') }}"></script>  
  @endpush
  <section class="container-fluid">
    {{-- TODO -> dividir en componentes --}}
    <div class="bs-stepper">
      <div class="bs-stepper-header" role="tablist">
        <div class="step" data-target="#typeStep">
          <button type="button" class="step-trigger" role="tab">
            <span class="bs-stepper-circle">1</span>
            <span class="bs-stepper-label">Tipo de pago</span>
          </button>
        </div>
        <div class="line d-none d-lg-block"></div>
        <div class="step" data-target="#confirmStep">
          <button type="button" class="step-trigger" role="tab">
            <span class="bs-stepper-circle">2</span>
            <span class="bs-stepper-label">Confirmación del pago</span>
          </button>
        </div>
        <div class="line d-none d-lg-block"></div>
        <div class="step" data-target="#finalStep">
          <button type="button" class="step-trigger" role="tab">
            <span class="bs-stepper-circle">3</span>
            <span class="bs-stepper-label">Inscripción finalizada</span>
          </button>
        </div>
      </div>
      <div class="bs-stepper-content">
        <div class="content fade callout callout-info" id="typeStep"></div>
        <div class="content fade callout callout-info" id="confirmStep"></div>
        <div class="content fade callout callout-success" id="finalStep">
          <h3>Inscripción finalizada</h3>
          <div class="alert alert-success mt-3">
            <i class="fas fa-info-circle fa-lg mr-2"></i>
            <p class="font-weight-normal d-inline" id="finalParagraph"></p>
          </div>
          <x-button :url="route('enrollment.download', $registry->id)" icon="file">
            Descargar Planilla de Inscripción
          </x-button>
          <x-button :url="route('market.index')" color="secondary">
            Ir al listado de cursos
          </x-button>
        </div>
      </div>
    </div>
  </section>
  <script>
    const enrolledType = '{{ $enrolledType }}';
  </script>
</x-layout.main>