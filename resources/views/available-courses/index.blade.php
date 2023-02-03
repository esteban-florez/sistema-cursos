<x-layout.main title="Cursos">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('available-courses.index') }}
  </x-slot>
  @push('css')
    <link rel="stylesheet" href="{{ asset('css/cursos.css') }}">
  @endpush
  <x-layout.bar>
    <x-search placeholder="Buscar curso..." name="search" :value="$search">
      <x-slot name="hidden">
        <input type="hidden" name="sort" value="{{ $sort }}">
      </x-slot>
    </x-search>
      <x-button icon="filter" hide-text="sm" data-target="#filtersCollapse" data-toggle="collapse">
        Ordenar por
      </x-button>
      <x-slot name="filtersCollapse">
        <x-filters-collapse>
          <x-slot name="sorts">
            <x-radio :options="['date' => 'Fecha de publicación', 'name' => 'Nombre', 'total_price' => 'Monto']" name="sort" :checked="$sort" notitle first-empty/>
          </x-slot>
        </x-filters-collapse>
      </x-slot>
  </x-layout.bar>
  <section class="container-fluid">
    <div class="courses-grid">
      @forelse($courses as $course)
        <x-course.card :course="$course" :last="$loop->last"/>
      @empty
        <div class="empty-container">
          <h2 class="empty">No hay cursos disponibles</h2>
        </div>
      @endforelse
    </div>
  </section>
</x-layout.main>