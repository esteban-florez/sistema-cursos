<x-layout.main title="Inscripción en curso">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('enrollments.create', $course) }}
  </x-slot>
  @php
    $reservation = $course->hasReserv();
  @endphp
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
    <script type="module" src="{{ asset('js/inscripcionjs/inscripcionStepper.js') }}"></script>
    <script defer src="{{ asset('js/inscripcionjs/responsiveStepper.js') }}"></script>  
  @endpush
  <x-alert />
  <section class="container-fluid px-3">
    <div class="card mt-3">
      <div class="card px-3 pt-2 m-0 bg-primary">
        <h2 class="h4 text-center">Curso: {{ $course->name }}</h2>
      </div>
      <x-enrollment-data :credentials="$credentials" :course="$course" />
      <x-errors />
      @can('create', [App\Models\Enrollment::class, $course])
        <form method="POST" action="{{ route('enrollments.store', ['course' => $course]) }}">
          <input type="hidden" name="category" value="{{ $reservation ? '' : 'Pago completo' }}">
          <input type="hidden" name="amount">
          @unless ($reservation)
            <input type="hidden" name="mode" value="Un solo pago">
          @endunless
          @csrf
          <div ref="stepper" class="bs-stepper">
            <x-stepper.header :reservation="$reservation"/>
            <div class="bs-stepper-content">  
              @if ($reservation)
                <x-stepper.content id="modeStep" first>
                  <h3>Seleccione la modalidad de pago</h3>
                  <x-radio name="mode" :options="modes()->pairs()" required/>
                </x-stepper.content>            
              @endif
              <x-stepper.content id="typeStep" :first="!$reservation">
                <h3>Seleccione el tipo de pago</h3>
                <x-radio name="type" :options="payTypes()->pairs()" required/>
              </x-stepper.content>
              <x-stepper.content id="confirmStep"></x-stepper.content>
              <x-stepper.content id="finalStep"></x-stepper.content>
            </div>
          </div>
        </form>
      @endcan
    </div>
  </section>
</x-layout.main>