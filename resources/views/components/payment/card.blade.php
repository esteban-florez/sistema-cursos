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
    <a href="{{ route('payments.show', $payment->id) }}">
      Ver detalles
    </a>
  </div>
  <x-payment.status-button :id="$payment->id" type="confirmed"/>
  <x-payment.status-button :id="$payment->id" type="rejected"/>
</div>
