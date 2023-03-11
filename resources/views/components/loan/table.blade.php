@props(['loans'])

<x-table>
  <x-slot name="header">
    <tr>
      <th>Código</th>
      <th>Artículo</th>
      <th>Club</th>
      <th>Cantidad</th>
      <th>Instructor</th>
      <th>Devuelto</th>
      <th>Acciones</th>
    </tr>
  </x-slot>
  <x-slot name="body">
    @foreach ($loans as $loan)
      <x-row
        :data="[
            '#'.$loan->item->code,
            $loan->item->name,
            $loan->club->name,
            $loan->full_amount,
            $loan->club->instructor->full_name,
            $loan->return_date,
          ]"
      >
        <x-slot name="actions">
          @can('update', $loan)
            <form action="{{ route('loans.update', $loan) }}" method="POST">
              @csrf
              @method('PATCH')
              <x-button class="btn-sm" type="submit" icon="check">
                Devolver
              </x-button>
            </form>
          @endcan
        </x-slot>
      </x-row>
    @endforeach
  </x-slot>
  <x-slot name="pagination">
    <div class="d-flex justify-content-center">
      {{ $loans->links() }}
    </div>
  </x-slot>
</x-table>
