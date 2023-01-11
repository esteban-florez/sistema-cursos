@php
  $course = $payment->inscription->course;
@endphp

<x-layout.main title="Editar pago">
  @push('js')
    <script defer src="{{ asset('js/payments-edit.js') }}"></script>
  @endpush
  <section class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12 col-md-8 col-lg-6">
        <div class="card my-2">
          <div class="card-body">
            <form method="POST" action="{{ route('payments.update', $payment->id) }}">
              @csrf
              @method('PUT')
              <h4>
                Curso: <a href="{{ route('courses.show', $course->id) }}">{{ $course->name }}</a>
              </h4>
              <hr>
              <x-select name="type" :options="payTypes()->pairs()" :selected="old('type') ?? $payment->type">
                Tipo de pago:
              </x-select>
              <x-input-group addon="--" name="amount" type="number" step="0.01" :value="old('amount') ?? $payment->amount">
                Monto:
              </x-input-group>
              <x-field name="ref" type="number" :value="old('ref') ?? $payment->ref">
                Referencia:
              </x-field>
              <div class="d-flex gap-2">
                <x-button color="secondary" icon="arrow-left" :url="route('students-payments.index', user()->id)">
                  Volver
                </x-button>
                <x-button color="success" icon="check" type="submit">
                  Aceptar
                </x-button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</x-layout.main>