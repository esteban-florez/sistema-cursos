<x-layout.main title="Mis pagos">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('users.payments.index', $user) }}
  </x-slot>
  <x-alert />
  @push('css')
    <link rel="stylesheet" href="{{ asset('css/students-payments.css') }}">
  @endpush
  <section class="mt-3">
    @if ($payments->isNotEmpty())
      <div class="container-fluid payments-flex">
        @foreach ($payments as $payment)
          {{-- IMPROVE -> N+1 queries here? --}}
          <x-payment.alt-card :payment="$payment"/>
        @endforeach
      </div>
      <div class="d-flex justify-content-center">
        {{ $payments->links() }}
      </div>
    @else
      <div class="empty-container">
        <h2 class="empty">Actualmente no tienes pagos registrados</h2>
      </div>
    @endif
  </section>
</x-layout.main>
