@props(['payment'])

@php
  $course = $payment->enrollment->course;
  $enrollment = $payment->enrollment;
@endphp

<div class="card payment-card">
  <div class="card-header">
    @can('users.enrollments.view', $enrollment)
      <a href="{{ route('users.enrollments.show', $enrollment) }}">
        <h4 class="text-bold text-truncate mb-0">
          {{ $course->name }}
        </h4>
      </a>
    @endcan
    <x-payment.status :payment="$payment"/>
  </div>
  <div class="card-body">
    <ul class="list-group">
      <li class="list-group-item bg-light">Fecha: <b>{{ $payment->updated_at->format(DF) }}</b></li>
      <li class="list-group-item bg-light">Categoría: <b>{{ $payment->category }}</b></li>
      <li class="list-group-item bg-light">Referencia: <b>{{ $payment->ref ?? '----' }}</b></li>
      <li class="list-group-item bg-light">Monto: <b>{{ $payment->full_amount }}</b></li>
      <li class="list-group-item bg-light">Tipo: <b>{{ $payment->type }}</b></li>
    </ul>
    <div class="d-flex align-items-center gap-2 mt-3">
      @can('update', $payment)
        <x-button :url="route('payments.edit', $payment)" icon="edit" color="warning">
          Editar
        </x-button>
      @endcan
    </div>
  </div>
</div>
