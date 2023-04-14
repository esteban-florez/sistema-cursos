@props(['payment'])

<div class="card-body p-2">
  <div class="callout callout-secondary mb-0 p-2">
    <h5 class="mb-0 text-success">
      {{ $payment->full_amount }}
    </h5>
    <p class="mb-0">
      <b>Referencia:</b> 
      {{ $payment->ref ?? '----' }}
    </p>
    <p class="mb-0">
      <b>Fecha:</b> 
      {{ $payment->updated_at->format(DF) }}
    </p>
  </div>
</div>