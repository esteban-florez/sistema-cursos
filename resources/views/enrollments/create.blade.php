<x-layout.main title="Inscripción en Curso">
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
    <script defer type="module" src="{{ asset('js/inscripcionjs/inscripcionStepper.js') }}"></script>
    <script defer src="{{ asset('js/inscripcionjs/responsiveStepper.js') }}"></script>  
  @endpush
  <x-alert />
  <section class="container-fluid" id="vueApp">
    @error('ref')
      {{-- TODO -> 1 --}}
      <div class="alert alert-danger m-0">
        {{ ucfirst($message) }}
      </div>
    @enderror
    <div ref="stepper" class="bs-stepper">
      <x-stepper.header :reservation="$reservation"/>
      <div class="bs-stepper-content">
        @if ($reservation)
          <x-stepper.content id="modeStep" first>
            <h3>Seleccione la modalidad de pago</h3>
            <x-radio name="mode" :options="modes()->pairs()"/>
          </x-stepper.content>            
        @endif
        <x-stepper.content id="typeStep" :first="!$reservation">
          <h3>Seleccione el tipo de pago</h3>
          <x-radio name="type" :options="payTypes()->pairs()"/>
        </x-stepper.content>
        <x-stepper.content id="confirmStep"></x-stepper.content>
        <x-stepper.content id="finalStep"></x-stepper.content>
      </div>
    </div>
  </section>
  <script>
    window.initial = Date.now()
    const credentialsData = `{!! json_encode($credentials) !!}`
    const courseData = `{!! json_encode($course) !!}`
  </script>
</x-layout.main>