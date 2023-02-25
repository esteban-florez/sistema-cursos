<x-layout.main title="Miembros">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('memberships.index', $club) }}
  </x-slot>
  @push('css')
    <link rel="stylesheet" href="{{ asset('css/listados.css') }}">
  @endpush
  <section class="content">
    <x-alert />
    <div class="container-fluid">
      <div class="card py-2 px-3 mb-0 list-top">
        <x-joined.header :club="$club" :memberships="$memberships"/>
      </div>
      <div class="card list-bottom">
        @if($memberships->total() === 0)
          <div class="empty-container">
            <div class="empty h5">Este club aún no posee miembros.</div>
          </div>
        @else
          <x-joined.table :club="$club" :memberships="$memberships"/>
        @endif
      </div>
    </div>
  </section>
</x-layout.main>