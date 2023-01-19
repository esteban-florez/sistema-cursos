<x-layout.main title="Mis pagos">
  @push('css')
    <link rel="stylesheet" href="{{ asset('css/students-payments.css') }}">
  @endpush
  <x-alert />
  @forelse ($payments as $payment)
    <section class="container-fluid mt-2 payments-flex" style="column-gap: 1rem;">
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
              <li class="list-group-item bg-light">Referencia: <b>{{ $payment->ref ?? '----' }}</b></li>
              <li class="list-group-item bg-light">Monto: <b>{{ $payment->full_amount }}</b></li>
              <li class="list-group-item bg-light">Tipo: <b>{{ $payment->type }}</b></li>
            </ul>
            <div class="d-flex align-items-center gap-2 mt-3">
              @if($payment->status !== 'Aprobado')
                <x-button :url="route('payments.edit', $payment->id)" icon="edit" color="warning">
                  Editar
                </x-button>
              @endif
              <x-button icon="trash" color="danger">
                Eliminar
              </x-button>
            </div>
          </div>
        </div>
      </section>
    @empty
      <div class="empty-container">
        <h2 class="empty">Actualmente no tienes pagos registrados</h2>
      </div>
    @endforelse
</x-layout.main>