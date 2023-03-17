<x-layout.main title="Pagar cuota restante">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('unfulfilled-payments.edit', $payment) }}
  </x-slot>
  @push('css')
    <link rel="stylesheet" href="{{ asset('css/loading.css') }}">
  @endpush
  @push('js')
    <script defer src="{{ asset('js/ref-input.js') }}"></script>
    <script type="module" src="{{ asset('js/print-amount.js') }}"></script>
  @endpush
  @php
    $user = auth()->user();
  @endphp
  <x-select2 />
  <div id="serialized" data-course="{{ json_encode($course) }}"></div>
  <section class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12 col-md-8 col-lg-6">
        <div class="card my-2">
          <div class="card-body">
            @can('unfulfilled-payments.update', $payment)
              <form method="POST" action="{{ route('unfulfilled-payments.update', $payment) }}">
                @csrf
                @method('PATCH')
                <h4>
                  Curso: <a class="text-bold" href="{{ route('courses.show', $course) }}">{{ $course->name }}</a>
                </h4>
                <div class="d-flex align-items-center">
                  <span class="h5 mb-0">Monto:</span>
                  <span class="placeholder-glow col-8 text-bold mb-0" id="amountLabel">
                    <span class="placeholder col-12"></span>
                  </span>
                </div>
                <hr>
                <input type="hidden" name="amount">
                <x-select name="type" :options="payTypes()->pairs()" :selected="old('type') ?? ''">
                  Tipo de pago:
                </x-select>
                <x-field name="ref" type="number" :value="old('ref') ?? ''" minlength="4" maxlength="10" validNumber disabled>
                  Referencia:
                </x-field>
                <div class="d-flex gap-2">
                  @can($user, 'unfulfilled-payments.viewAny', $payment)
                    <x-button color="secondary" icon="arrow-left" :url="route('unfulfilled-payments.index', ['user' => $user])">
                      Volver
                    </x-button>
                  @endcan
                  <x-button color="success" icon="check" type="submit">
                    Confirmar pago
                  </x-button>
                </div>
              </form>
            @endcan
          </div>
        </div>
      </div>
    </div>
  </section>
</x-layout.main>