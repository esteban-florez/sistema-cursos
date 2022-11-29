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
      {{ $payment->date }}
    </span>
  </p>  
  <div class="mb-2">
    <a href data-details="{{ json_encode([
      'payment' => $payment,
      'course' => $payment->registry->course,
      'student' => $payment->registry->student
    ]) }}">
      Ver detalles
    </a>
  </div>
  <x-payment.status-button :id="$payment->id" type="confirmed" color="success"/>
  <x-payment.status-button :id="$payment->id" type="rejected" color="danger"/>
</div>
