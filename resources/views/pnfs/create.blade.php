<x-layout.main title="Añadir PNF">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('pnfs.create') }}
  </x-slot>
  @can('create', App\Models\PNF::class)
    <x-pnf-form />
  @endcan
</x-layout.main>