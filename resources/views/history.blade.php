<x-layout.main title="Bitácora">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('history') }}
  </x-slot>
  <section class="container-fluid">
    @if ($histories->isNotEmpty())
      <x-table>
        <x-slot name="header">
          <th>Nombre</th>
          <th>Correo</th>
          <th>Cédula</th>
          <th>Acción</th>
          <th>Fecha</th>
        </x-slot>
        <x-slot name="body">
          @foreach ($histories as $history)
            <tr>
              <td>{{ $history->user->full_name }}</td>
              <td>{{ $history->user->email }}</td>
              <td>{{ $history->user->full_ci }}</td>
              <td>{{ $history->action }}</td>
              <td>{{ $history->created_at->format(DF) }}</td>
            </tr>
          @endforeach
        </x-slot>
        <x-slot name="pagination">
          <div class="pagination-container">
            {{ $histories->links() }}
          </div>
        </x-slot>
      </x-table>
    @else
      <div class="empty-container">
        <h2 class="empty">Aún no existen entradas en la bitácora.</h2>
      </div>
    @endif
  </section>
</x-layout.main>