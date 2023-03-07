@props(['loans'])

<x-table>
  <x-slot name="header">
    <tr>
      <th>Cantidad</th>
      <th>Artículo</th>
      <th>Club</th>
      <th>Instructor</th>
      <th>Devuelto</th>
      <th>Acciones</th>
    </tr>
  </x-slot>
  <x-slot name="body">
    @foreach ($loans as $loan)
      <x-row
        :data="[
            $loan->amount,
            $loan->item->name,
            $loan->club->name,
            $loan->club->instructor->full_name,
            // No me funciona la mrda del format(DF)
            // $loan->returned_at->format(DF),
            $loan->returned_at,
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
          @else
            <h6 class="mb-0 text-success">Devuelto</h6>
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
