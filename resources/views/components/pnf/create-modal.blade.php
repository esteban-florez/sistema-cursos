<x-modal id="createPnfModal">
  <x-slot name="header">
    <h4 class="modal-title">Añadir PNF</h4>
    <button type="button" class="close" data-dismiss="modal">
      <span class="text-white">&times;</span>
    </button>
  </x-slot>
  @can('create', App\Models\PNF::class)
    <x-pnf-form />
  @endcan
</x-modal>