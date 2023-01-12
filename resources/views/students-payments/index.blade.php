<x-layout.main title="Mis pagos">
  @push('css')
    <link rel="stylesheet" href="{{ asset('css/students-payments.css') }}">
  @endpush
  <x-alerts type="success" icon="plus-circle"/>
  <x-alerts type="warning" icon="edit"/>
  <x-alerts type="danger" icon="times-circle"/>
  <section class="container-fluid mt-2 payments-flex" style="column-gap: 1rem;">
    @foreach ($payments as $payment)
      @php
        $course = $payment->enrollment->course;
      @endphp
      <div class="card payment-card position-relative">
        <div class="card-body">
          <a href="#{{Str::slug($course->name)}}">
            <h4 class="text-bold">
              {{ $course->name }}
            </h4>
          </a>
          <ul class="list-group">
            <li class="list-group-item bg-light">Fecha: <b>{{ $payment->updated_at->format(DF) }}</b></li>
            <li class="list-group-item bg-light">Referencia: <b>{{ $payment->ref ?? '----' }}</b></li>
            <li class="list-group-item bg-light">Monto: <b>{{ $payment->full_amount }}</b></li>
            <li class="list-group-item bg-light">Tipo: <b>{{ $payment->type }}</b></li>
            <li class="list-group-item bg-light">Estado: <b>{{ $payment->status }}</b></li>
          </ul>
          <div class="d-flex align-items-center gap-2 mt-3">
            @if($payment->status !== 'Aprobado')
              <x-button :url="route('payments.edit', $payment->id)" icon="edit" color="warning">
                Editar
              </x-button>
            @endif
            <x-button icon="thrash" color="danger">
              Eliminar
            </x-button>
          </div>
        </div>
      </div>
    @endforeach
  </section>
</x-layout.main>