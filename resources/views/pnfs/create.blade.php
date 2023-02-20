<x-layout.main title="Añadir PNF">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('pnfs.create') }}
  </x-slot>
  <x-pnf-form />
</x-layout.main>