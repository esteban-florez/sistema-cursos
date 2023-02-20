<x-layout.main title="Editar PNF">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('pnfs.edit', $pnf) }}
  </x-slot>
  <x-pnf-form :pnf="$pnf"/>
</x-layout.main>