<x-layout.main title="Editar PNF">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('pnfs.edit', $pnf) }}
  </x-slot>
  @can('update', $pnf)
    <x-pnf-form :pnf="$pnf"/>
  @endcan
</x-layout.main>