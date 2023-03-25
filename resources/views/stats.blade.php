<x-layout.main title="Estadísticas">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('stats') }}
  </x-slot>
  <section class="container-fluid px-3 mt-3">
    <div class="row">
      <div class="col-md-4 px-2">
        <x-stats.list title="Generales">
          <x-stats.box
            title="Estudiantes registrados"
            :content="$students"
            color="info"
            icon="users"
          />
          <x-stats.box
            title="Ingresos confirmados"
            :content="$incomes"
            color="success"
            icon="money-bill"
          />
          <x-stats.box
            title="Instructores registrados"
            :content="$instructors"
            color="danger"
            icon="chalkboard-teacher"
          />
        </x-stats.list>
      </div>
      <div class="col-md-4 px-2">
        <x-stats.list title="Cursos">
          <x-stats.box
            title="Cursos registrados"
            :content="$courses"
            color="info"
            icon="graduation-cap"
          />
          <x-stats.box
            title="Estudiantes inscritos"
            :content="$enrollments"
            color="success"
            icon="user-graduate"
          />
          <x-stats.box title="Curso más popular" color="danger" icon="star">
            <x-slot name="content">
              <a href="{{ route('courses.show', $course) }}">
                {{ $course->name }}
              </a>
            </x-slot>
          </x-stats.box>
        </x-stats.list>
      </div>
      <div class="col-md-4 px-2">
        <x-stats.list title="Clubes">
          <x-stats.box
            title="Clubes registrados"
            :content="$clubs"
            color="info"
            icon="basketball-ball"
          />
          <x-stats.box
            title="Estudiantes miembros"
            :content="$memberships"
            color="success"
            icon="passport"
          />
          <x-stats.box title="Club más popular" color="danger" icon="star">
            <x-slot name="content">
              <a href="{{ route('clubs.show', $club) }}">
                {{ $club->name }}
              </a>
            </x-slot>
          </x-stats.box>
        </x-stats.list>
      </div>
    </div>
  </section>
</x-layout.main>