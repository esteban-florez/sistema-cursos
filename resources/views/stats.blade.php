<x-layout.main title="Estadísticas">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('stats') }}
  </x-slot>
  @push('js-plugins')
    <script src="{{ asset('js/chart.min.js') }}"></script>
  @endpush
  @push('js')
    <script type="module" src="{{ asset('js/charts/index.js') }}"></script>
  @endpush
  <div id="serialized" data-charts="{{ url('api/charts') }}"></div>
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
  <section class="container-fluid px-3">
    <div class="card card-dark">
      <div class="card-header">
        <h2 class="mb-0 text-center">Gráficas</h2>
      </div>
      <div class="card-body">
        <div class="d-flex align-items-center gap-4">
          <div class="col-md-7">
            <h5 class="text-center">Pagos por tipo</h5>
            <canvas id="paymentsPerType"></canvas>
          </div>
          <div class="col-md-4">
            <h5 class="text-center">Porcentaje de pagos por estado</h5>
            <canvas id="paymentsPerStatus"></canvas>
          </div>
        </div>
        <hr>
        <div class="d-flex align-items-center gap-4">
          <div class="col-md-4">
            <h5 class="text-center">Pagos por categoría</h5>
            <canvas id="paymentsPerCategory"></canvas>
          </div>
          <div class="col-md-7">
            <h5 class="text-center">Estudiantes por grado de instrucción</h5>
            <canvas id="studentsPerGrade"></canvas>
          </div>
        </div>
        <hr>
        <div class="d-flex align-items-center gap-4">
          <div class="col-md-7">
            <h5 class="text-center">Cursos por fase actual</h5>
            <canvas id="coursesPerPhase"></canvas>
          </div>
          <div class="col-md-4">
            <h5 class="text-center">Porcentaje de matrículas por estado</h5>
            <canvas id="enrollmentsPerStatus"></canvas>
          </div>
        </div>
      </div>
    </div>
  </section>
</x-layout.main>