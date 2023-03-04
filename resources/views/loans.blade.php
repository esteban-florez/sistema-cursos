<x-layout.main title="Préstamo de Artículos">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('loans.index') }}
  </x-slot>
  <x-layout.bar>
    {{-- No deberia estar esto realmente xd, pero el botoncito queda feo --}}
    <x-search name="search" placeholder="Buscar préstamos..." :value="$search ?? ''"/>
    <x-button icon="plus" color="success" hide-text="sm" data-target="#itemLoanModal" data-toggle="modal">Añadir</x-button>
  </x-layout.bar>
  <section class="container-fluid">
    <x-errors />
    <x-select2 />
    <x-alert />
    @if ($loans->isNotEmpty())
      <x-loan.table :loans=$loans />
    @else
      <div class="empty-container">
        <h2 class="empty">No hay préstamos registrados</h2>
      </div>
    @endif
  </section>
</x-layout.main>
<x-loan.new :items=$items :clubs=$clubs />