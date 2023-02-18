@props(['payment'])

@php
  $course = $payment->enrollment->course;
@endphp

<div class="card payment-card position-relative">
  <div class="card-body">
    <a href="{{ route('courses.show', $course->id) }}">
      <h4 class="text-bold">
        {{ $course->name }}
      </h4>
    </a>
    <x-payment.status :payment="$payment"/>
    <ul class="list-group">
      <li class="list-group-item bg-light">Fecha: <b>{{ $payment->updated_at->format(DF) }}</b></li>
      <li class="list-group-item bg-light">Categoría: <b>{{ $payment->category }}</b></li>
      <li class="list-group-item bg-light">Referencia: <b>{{ $payment->ref ?? '----' }}</b></li>
      <li class="list-group-item bg-light">Monto: <b>{{ $payment->full_amount }}</b></li>
      <li class="list-group-item bg-light">Tipo: <b>{{ $payment->type }}</b></li>
    </ul>
    <div class="d-flex align-items-center gap-2 mt-3">
      @if($payment->status !== 'Confirmado')
        <x-button :url="route('payments.edit', $payment->id)" icon="edit" color="warning">
          Editar
        </x-button>
      @endif
    </div>
  </div>
</div>
