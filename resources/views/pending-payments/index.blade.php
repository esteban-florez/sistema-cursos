<x-layout.main title="Pagos pendientes">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('pending-payments.index') }}
  </x-slot>
  @push('js')
    <script defer type="module" src="{{ asset('js/payments/editPaymentStatus.js') }}"></script>
  @endpush

  <x-alert />
  <section class="container-fluid pt-2">
    <div class="payments-grid">
      @foreach ($payments as $payment)
        <x-payment.card :payment="$payment" />
      @endforeach
    </div>
  </section>
  <section class="mt-3 d-flex justify-content-center">
    {{ $payments->links() }}
  </section>
</x-layout.main>