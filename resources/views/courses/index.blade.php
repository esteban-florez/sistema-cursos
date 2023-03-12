<x-layout.main title="Cursos">
  <x-select2/>
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('courses.index') }}
  </x-slot>
  @push('css')
    <link rel="stylesheet" href="{{ asset('css/cursos.css') }}">
  @endpush
  <x-layout.bar>
    <x-search 
      placeholder="Buscar curso..." :value="$search"
      name="search" :filters="$filters" :sort="$sort"/>
    <div>
      @can('create', App\Models\Course::class)
        <x-button icon="plus" color="success" hide-text="sm" :url="route('courses.create')">
          Añadir
        </x-button>
      @endcan
      <x-button icon="filter" hide-text="sm" data-target="#filtersCollapse" data-toggle="collapse">
        Filtros
      </x-button>
    </div>
    <x-slot name="filtersCollapse">
      <x-filters-collapse>
        <x-slot name="filters">
          <x-select :options="$areas" id="areaId" name="filters|area_id" :selected="$filters['area_id'] ?? null">
            Área de Formación
          </x-select>
          <x-select :options="phases()->pairs()" id="phase" name="filters|phase" :selected="$filters['phase'] ?? null">
            Fase
          </x-select>
        </x-slot>
        <x-slot name="sorts">
          <x-radio :options="['' => 'Fecha de creación', 'name' => 'Nombre', 'total_price' => 'Monto', 'duration' => 'Duración']" name="sort" :checked="$sort" notitle/>
        </x-slot>
      </x-filters-collapse>
    </x-slot>
  </x-layout.bar>
  <section class="container-fluid">
    <x-alert />
    @if ($courses->isNotEmpty())
      <x-table>
        <x-slot name="header">
          <th>Nombre</th>
          <th>Instructor</th>
          <th>Inscripciones</th>
          <th>Fecha</th>
          <th>Duración</th>
          <th>Matrícula</th>
          <th>Monto</th>
          <th>Fase</th>
          <th>Acciones</th>
        </x-slot>
        <x-slot name="body">
          @foreach ($courses as $course)
            <x-row :data="[
              $course->name,
              $course->instructor->full_name,
              $course->ins_date,
              $course->date,
              $course->duration_hours,
              $course->student_diff,
              $course->total_amount,
              $course->phase,
              ]"
            >
              <x-slot name="actions">
                @can('viewAny', [App\Models\Enrollment::class, $course])
                  <x-button class="btn-sm" color="secondary" :url="route('enrollments.index', ['course' => $course])" icon="clipboard-list">
                    Matrícula
                  </x-button>
                @endcan
                @can('update', [App\Models\Enrollment::class, $course])
                  <x-button class="btn-sm" :url="route('courses.edit', $course)" color="warning" icon="edit">
                    Editar
                  </x-button>
                @endcan
                <x-button class="btn-sm" :url="route('courses.show', $course)" icon="eye">
                  Detalles
                </x-button>
              </x-slot>
            </x-row>
          @endforeach
        </x-slot>
        <x-slot name="pagination">
          <div class="pagination-container">
            {{ $courses->links() }}
          </div>
        </x-slot>
      </x-table>
    @else
      <div class="empty-container">
        <h2 class="empty">No hay cursos disponibles</h2>
      </div>
    @endif
  </section>
</x-layout.main>