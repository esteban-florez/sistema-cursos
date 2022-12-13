<x-layout.main title="Estudiantes">
  <x-layout.bar>
    <x-search placeholder="Buscar estudiante..." :value="$search" name="search" :action="route(Route::currentRouteName())">
      <x-slot name="hidden">
        @foreach ($filters as $filter => $value)
          <input type="hidden" name="filters|{{ $filter }}" value="{{ $value }}">
        @endforeach
        <input type="hidden" name="sort" value="{{ $sort }}">
      </x-slot>
    </x-search>
    <div>
      <x-button icon="plus" color="success" hide-text="sm" :url="route('students.create')">Añadir</x-button>
      <x-button icon="filter" hide-text="sm" data-target="#filtersCollapse" data-toggle="collapse">Filtros</x-button>
    </div>
    <x-slot name="filtersCollapse">
      <x-filters-collapse>
        <x-slot name="filters">
          <x-select :options="['true' => 'Sí', 'false' => 'No']" id="isUpta" name="filters|is_upta" :selected="$filters['is_upta'] ?? null">
            ¿UPTA?
          </x-select>
        </x-slot>
        <x-slot name="sorts">
          <x-radio :options="['date' => 'Fecha', 'first_name' => 'Nombre', 'ci' => 'Cédula']" name="sort" :checked="$sort" notitle first-empty/>
        </x-slot>
      </x-filters-collapse>
    </x-slot>
  </x-layout.bar>
  <section class="container-fluid">
    <x-alerts type="success" icon="user-plus"/>
    <x-alerts type="warning" icon="user-edit"/>
    <x-alerts type="danger" icon="user-minus"/>
    <x-table>
      <x-slot name="header">
        <th>Nombre</th>
        <th>Cédula</th>
        <th>Teléfono</th>
        <th>Correo</th>
        <th>¿UPTA?</th>
        <th>Acciones</th>
      </x-slot>
      <x-slot name="body">
        @forelse ($students as $student)
          <x-row :data="[
            $student->full_name,
            $student->full_ci,
            $student->tel,
            $student->email,
            $student->is_upta,
            ]"
            :details="route('students.show', $student->id)"
            :edit="route('students.edit', $student->id)"
            :delete="route('students.destroy', $student->id)"
          />
        @empty
          {{-- TODO -> arreglar el empty state que se vea bonito --}}
          <p class="w-100 text-center text-muted">No hay estudiantes registrado actualmente</p>
        @endforelse
      </x-slot>
      <x-slot name="pagination">
        <div class="pagination-container">
          {{ $students->links() }}
        </div>
      </x-slot>
    </x-table>
  </section>
</x-layout.main>