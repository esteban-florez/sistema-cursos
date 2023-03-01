<x-layout.main title="Historial de inventario">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('operations.index') }}
  </x-slot>
  <x-select2 />
  <x-layout.bar>
    <x-search 
      placeholder="Buscar artículo por código..." name="search"
      :value="$search ?? ''" :filters="$filters" :sort="$sort"/>
    <div class="ml-auto">
      <x-button icon="filter" hide-text="sm" data-target="#filtersCollapse" data-toggle="collapse">
        Filtros
      </x-button>
    </div>
    <x-slot name="filtersCollapse">
      <x-filters-collapse>
        <x-slot name="filters">
          <x-select :options="$items" id="itemId" name="filters|item_id" :selected="$filters['item_id'] ?? null">
            Artículo:
          </x-select>
          <x-select :options="operationTypes()->pairs()" id="type" name="filters|type" :selected="$filters['type'] ?? null">
            Tipo:
          </x-select>
        </x-slot>
        <x-slot name="sorts">
          <x-radio :options="['' => 'Fecha', 'amount' => 'Cantidad']" name="sort" :checked="$sort" notitle/>
        </x-slot>
      </x-filters-collapse>
    </x-slot>
  </x-layout.bar>
  <x-errors />
  <x-alert />
  <section class="container-fluid">
    @if ($operations->isNotEmpty())
      <x-table>
        <x-slot name="header">
          <th>Código</th>
          <th>Artículo</th>
          <th>Operación</th>
          <th>Descripción</th>
          <th>Fecha</th>
        </x-slot>
        <x-slot name="body">
          @foreach ($operations as $operation)
            @php
              $color = $operation->type === 'Ingreso' ? 'success' : 'danger';
            @endphp
            <tr>
              <td># {{$operation->item->code}}</td>
              <td>{{ $operation->item->name }}</td>
              <td class="text-{{ $color }} text-bold">{{ $operation->full_amount }}</td>
              <td>{{ $operation->reason ?? '----' }}</td>
              <td>{{ $operation->created_at->format(DF) }}</td>
            </tr>
          @endforeach
        </x-slot>
        <x-slot name="pagination">
          <div class="pagination-container">
            {{ $operations->links() }}
          </div>
        </x-slot>
      </x-table>
    @else
      <div class="empty-container">
        <h2 class="empty">Aún no existen operaciones de inventario.</h2>
      </div>
    @endif
  </section>
</x-layout.main>