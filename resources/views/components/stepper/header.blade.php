@props(['reservation'])

<div class="bs-stepper-header" role="tablist">
  @if ($reservation)
    <x-stepper.trigger
    target="#modeStep"
    label="Modalidad de pago"
    number="1"/>
    <div class="line d-none d-lg-block"></div>
  @endif
  <x-stepper.trigger
    target="#typeStep"
    label="Tipo de pago"
    :number="$reservation ? '2' : '1'" />
  <div class="line d-none d-lg-block"></div>
  <x-stepper.trigger
    target="#confirmStep"
    label="Confirmación del pago"
    :number="$reservation ? '3' : '2'" />
  <div class="line d-none d-lg-block"></div>
  <x-stepper.trigger
    target="#finalStep"
    label="Inscripción finalizada"
    :number="$reservation ? '4' : '3'" />
</div>
