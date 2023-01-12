@props(['payment'])

@php
  $color = match ($payment->status) {
    'Pendiente' => 'secondary',
    'Rechazado' => 'danger',
    'Aprobado' => 'success',
  };
@endphp

<p {{ $attributes }}>
  Estado: 
  <span class="badge badge-{{ $color }} badge-3">{{ $payment->status }}</span>
</p>