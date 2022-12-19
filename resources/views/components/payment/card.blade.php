@props(['payment'])

<div class="callout callout-secondary mb-0">
  <h4 class="text-bold m-0"> 
    {{ $payment->amount }}
  </h4>
  <p class="text-bold m-0">
    Referencia: 
    <span class="font-weight-normal">
      {{ $payment->ref ?? 'N/A' }}
    </span>
  </p>
  <p class="text-bold m-0">
    Fecha: 
    <span class="font-weight-normal">
      {{ $payment->updated_at }}
    </span>
  </p> 
  <div class="mb-2">
    {{-- TODO -> esto toco arreglarlo a la machinberra por ahora --}}
    @php
      $payment->date = $payment->updated_at;
      unset($payment->updated_at);
    @endphp
    <a href data-details="{{ json_encode([
      'payment' => $payment,
      'course' => $payment->inscription->course,
      'student' => $payment->inscription->student
    ]) }}">
      Ver detalles
    </a>
  </div>
  <x-payment.status-button :id="$payment->id" value="Confirmado" />
  <x-payment.status-button :id="$payment->id" value="Rechazado" color="danger"/>
</div>
