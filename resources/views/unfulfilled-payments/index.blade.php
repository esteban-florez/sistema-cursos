<x-layout.main title="Cuotas restantes">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('unfulfilled-payments.index', $user) }}
  </x-slot>
  <x-alert />
  <div class="container-fluid mt-2">
    @if ($payments->isNotEmpty())
    <div class="row">
      @foreach ($payments as $payment)
      @php
        $course = $payment->enrollment->course;
      @endphp
      {{-- TODO N+1 queries here --}}
      <div class="col-md-6">
        <div class="card callout callout-primary p-0">
          <div class="card-body">
            <h4 class="alert alert-primary text-truncate">Curso: {{ $course->name }}</h4>
            <div class="row">
              <div class="col-md-6">
                <h6 class="mb-0 h5 text-center">Monto restante: </h6>
                <h5 class="text-success text-bold display-4 text-center" style="font-size: 2.8rem;">{{ $course->remaining_amount }}</h5>
              </div>
              <div class="col-md-6 d-flex flex-column gap-2">
                @can('unfulfilled-payments.update', $payment)
                  <x-button :url="route('unfulfilled-payments.edit', $payment)">
                    Realizar pago
                  </x-button>
                @endcan
                <x-button :url="route('courses.show', $course)" color="info">
                  Ver curso
                </x-button>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <div class="d-flex justify-content-center">
      {{ $payments->links() }}
    </div>
    @else
      <div class="empty-container">
        <h2 class="empty">Actualmente no tienes cuotas restantes.</h2>
      </div>
    @endif
  </div>
</x-layout.main>