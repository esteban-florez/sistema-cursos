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
    <script defer type="module" src="{{ asset('js/inscripcionjs/inscripcionStepper.js') }}"></script>  
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
        <div class="content fade callout callout-info" id="typeStep">
          <h3>Seleccione el tipo de pago</h3>
          <form>
            <div class="form-check">
              <input class="form-check-radio" type="radio" name="tipo-pago" value="pago-movil" id="pagoMovilRadio">
              <label class="form-check-label" for="pagoMovilRadio">Pago Móvil</label>
            </div>
            <div class="form-check">
              <input class="form-check-radio" type="radio" name="tipo-pago" value="transferencia" id="transferRadio">
              <label class="form-check-label" for="transferRadio">Transferencia</label>
            </div>
            <div class="form-check">
              <input class="form-check-radio" type="radio" name="tipo-pago" value="bolivares" id="bolivaresRadio">
              <label class="form-check-label" for="bolivaresRadio">Efectivo (Bs.D.)</label>
            </div>
            <div class="form-check">
              <input class="form-check-radio" type="radio" name="tipo-pago" value="dolares" id="dolaresRadio">
              <label class="form-check-label" for="dolaresRadio">Efectivo ($)</label>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-3">
              <div>
                <button class="btn btn-secondary" type="button" data-stepper="previous">Volver</button>
                <button class="btn btn-info" type="button" data-stepper="next" id="typeNextButton" disabled>Siguiente</button>
              </div>
              <button class="btn btn-danger" type="button" data-stepper="reset">Cancelar</button>
            </div>
          </form>
        </div>
        <div class="content fade callout callout-info" id="confirmStep"></div>
        <div class="content fade callout callout-success" id="finalStep"></div>
      </div>
    </div>
    <!-- <div class="col-12 d-md-none course-data-card">
        <div class="card card-dark collapsed-card">
          <div class="card-header">
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-plus"></i>
              </button>
            </div>
            <h3 class="mb-0">Datos del curso: </h3>
          </div>
          <div class="card-body">
            <h5>Nombre: </h5>
            <p class="mb-3">Curso de Programación Web</p>
            <h5>Fecha: </h5>
            <p class="mb-3">11-02-2022 al 13-03-2022</p>
            <h5>Monto total: </h5>
            <p class="mb-3">$45</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 d-none d-md-block course-data-card">
        <div class="card card-dark">
          <div class="card-header">
            <h3 class="mb-0">Datos del curso: </h3>
          </div>
          <div class="card-body">
            <h5>Nombre: </h5>
            <p class="mb-3">Curso de Programación Web</p>
            <h5>Fecha: </h5>
            <p class="mb-3">11-02-2022 al 13-03-2022</p>
            <h5>Monto total: </h5>
            <p class="mb-3">$45</p>
          </div>
        </div>
      </div> -->
  </section>
  <form
    data-amount="{{ $course->total_price }}"
    class="d-none"
    method="POST"
    action="{{ route('enrollment.store', $course->id) }}"
  >
    @csrf
    <input type="hidden" name="date" value="{{ Date::now()->format('Y-m-d') }}">
    <input type="hidden" name="ref" value="">
    <input type="hidden" name="amount" value="">
    <input type="hidden" name="type" value="">
    <button type="submit"></button>
  </form>
</x-layout.main>