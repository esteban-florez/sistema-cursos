<x-layout.main title="Estadísticas">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('stats') }}
  </x-slot>
  <section class="container-fluid px-3 mt-3">
    <div class="row">
      <div class="col-md-4 px-2">
        <x-stats.list title="Generales">
          <x-stats.box
            title="Usuarios registrados"
            content="144 usuarios"
            color="info"
          />
          <x-stats.box
            title="Usuarios registrados"
            content="$ 24.231"
            color="success"
          />
          <x-stats.box
            title="Curso más popular"
            content="$ 3.203"
            color="danger"
          />
        </x-stats.list>
      </div>
      <div class="col-md-4 px-2">
        <x-stats.list title="Cursos">
          <x-stats.box
            title="Cursos registrados"
            content="5 cursos"
            color="info"
          />
          <x-stats.box
            title="Estudiantes inscritos"
            content="142 estudiantes"
            color="success"
          />
          <x-stats.box title="Curso más popular" color="danger">
            <x-slot name="content">
              <a href="{{ route('courses.show', 1) }}">
                Programación Web
              </a>
            </x-slot>
          </x-stats.box>
        </x-stats.list>
      </div>
      <div class="col-md-4 px-2">
        <x-stats.list title="Clubes">
          <x-stats.box
            title="Clubes registrados"
            content="10 clubes"
            color="info"
          />
          <x-stats.box
            title="Estudiantes miembros"
            content="203 miembros"
            color="success"
          />
          <x-stats.box title="Curso más popular" color="danger">
            <x-slot name="content">
              <a href="{{ route('clubs.show', 1) }}">
                Basketball
              </a>
            </x-slot>
          </x-stats.box>
        </x-stats.list>
      </div>
    </div>
  </section>
</x-layout.main>