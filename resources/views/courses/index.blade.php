<x-layout.main title="Cursos">
  @push('css')
    <link rel="stylesheet" href="{{ asset('css/cursos-user.css') }}">
  @endpush
  
  <section class="container-fluid">
    @forelse ($courses as $course)
      <x-table>
        <x-slot name="header">
          <th>ID</th>
          <th>Nombre</th>
          <th>Instructor</th>
          <th>Precio</th>
          <th>Martícula</th>
          <th>Estado</th>
          <th>Duración</th>
          <th>Acciones</th>
        </x-slot>
        <x-slot name="body">
          <x-row :data="[
            $course->id,
            $course->name,
            $course->instructor_id,
            $course->total_price,
            $course->student_limit,
            $course->duration,
            $course->duration,
            ]"
            :details="route('courses.show', $course->id)"
            :edit="route('courses.edit', $course->id)"
          />
        </x-slot>
        <x-slot name="pagination">
          <div class="pagination-container">
          </div>
        </x-slot>
      </x-table>
    @empty
      <div class="contenedor">
        <h2 class="coursent">No hay cursos disponibles</h2>
      </div>
    @endforelse
  </section>
</x-layout.main>