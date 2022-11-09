<x-layout.main title="Instructores">
  <x-layout.bar>
    <x-search placeholder="Buscar instructor..."/>
    <div>
      <x-button icon="plus" color="success" hide-text="sm" :url="route('instructors.create')">Añadir</x-button>
      <x-button icon="filter" hide-text="sm" data-target="#filtersCollapse" data-toggle="collapse">Filtros</x-button>
    </div>
  </x-layout.bar>
  <section class="container-fluid">
    <x-table>
      <x-slot name="header">
        <th>Nombre</th>
        <th>Cédula</th>
        <th>Teléfono</th>
        <th>Correo</th>
        <th>¿Admin?</th>
        <th>Acciones</th>
      </x-slot>
      <x-slot name="body">
        @forelse ($instructors as $instructor)
          <x-row :data="[
            $instructor->full_name,
            $instructor->full_ci,
            $instructor->tel,
            $instructor->email,
            $instructor->admin,
            ]"
            :details="route('instructors.show', $instructor->id)"
            :edit="route('instructors.edit', $instructor->id)"
            :delete="route('instructors.destroy', $instructor->id)"
          />
        @empty
          {{-- TODO -> arreglar el empty state que se vea bonito --}}
          <p class="w-100 text-center text-muted">No hay usuarios registrado actualmente</p>
        @endforelse
      </x-slot>
      <x-slot name="pagination">
        <div class="pagination-container">
          {{ $instructors->links() }}
        </div>
      </x-slot>
    </x-table>
  </section>
</x-layout.main>