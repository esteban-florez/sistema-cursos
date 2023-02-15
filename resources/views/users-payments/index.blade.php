<x-layout.main title="Mis pagos">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('users.payments.index', $user) }}
  </x-slot>
  @push('css')
    <link rel="stylesheet" href="{{ asset('css/students-payments.css') }}">
  @endpush
  <x-alert />
  @if ($payments->isNotEmpty())
  <section class="container-fluid mt-2 payments-flex" style="column-gap: 1rem;">
    @foreach ($payments as $payment)
      {{-- TODO -> N+1 queries here? --}}
      <x-payment.alt-card :payment="$payment"/>
    @endforeach
  </section>
  <div class="d-flex justify-content-center">
    {{ $payments->links() }}
  </div>
  @else
    <div class="empty-container">
      <h2 class="empty">Actualmente no tienes pagos registrados</h2>
    </div>
  @endif
</x-layout.main>
