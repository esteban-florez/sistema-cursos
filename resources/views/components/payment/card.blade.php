@props(['payment'])
@php
  $details = [
    'payment' => $payment->attributesToArray(),
    'course' => $payment->enrollment->course->name,
    'student' => $payment->enrollment->student->full_name,
    'date' => $payment->updated_at->format(DF),  
  ];
@endphp

<div class="callout callout-secondary mb-0">
  <h4 class="text-bold m-0"> 
    {{ $payment->full_amount }}
  </h4>
  <p class="text-bold m-0">
    Referencia: 
    <span class="font-weight-normal">
      {{ $payment->ref ?? '----' }}
    </span>
  </p>
  <p class="text-bold m-0">
    Fecha: 
    <span class="font-weight-normal">
      {{ $payment->updated_at->format(DF) }}
    </span>
  </p> 
  <div class="mb-2">
    <a href data-details="{{ json_encode($details) }}">
      Ver detalles
    </a>
  </div>
  <x-payment.status-button :id="$payment->id" value="Confirmado" />
  <x-payment.status-button :id="$payment->id" value="Rechazado" color="danger"/>
</div>
