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
  <form method="POST" class="d-inline" action="{{ route('payments.update', $payment->id) }}">
    @csrf
    @method('PUT')
    <input type="hidden" name="status" value="confirmed">
    <x-button type="submit" color="success" icon="check">
      Aceptar
    </x-button>
  </form>
  <form method="POST" class="d-inline" action="{{ route('payments.update', $payment->id) }}">
    <input type="hidden" name="status" value="rejected">
    @csrf
    @method('PUT')
    <x-button type="submit" color="danger" icon="times">
      Rechazar
    </x-button>
  </form>
</div>
