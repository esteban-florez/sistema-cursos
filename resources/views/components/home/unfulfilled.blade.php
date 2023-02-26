@props(['payment'])

@php
  $course = $payment->enrollment->course;
@endphp

<div class="card-body p-2">
  <div class="callout callout-info mb-0 p-2">
    <h4 class="mb-0">{{ $course->name }}</h4>
    <h5 class="mb-0 text-success">
      <span class="text-dark">Monto restante:</span> 
      {{ $course->remaining_amount }}
    </h5>
  </div>
</div>