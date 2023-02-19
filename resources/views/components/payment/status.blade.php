@props(['payment'])

@php
  $color = match ($payment->status) {
    'Pendiente' => 'secondary',
    'Rechazado' => 'danger',
    'Confirmado' => 'success',
  };
@endphp

<h5 class="text-{{ $color }} mb-0">Estado: {{ $payment->status }}</h5>

{{-- <p {{ $attributes }}>
  Estado: 
  <span class="badge badge-{{ $color }} badge-3">{{ $payment->status }}</span>
</p> --}}