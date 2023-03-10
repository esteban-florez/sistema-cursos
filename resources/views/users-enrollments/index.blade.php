<x-layout.main title="Mis cursos">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('users.enrollments.index', $user) }}
  </x-slot>
  @php
    // DRY
    $approvalColors = [
      'Aprobado' => 'success',
      'Reprobado' => 'danger',
      'Por decidir' => 'secondary'
    ];

    $confirmationColors = [
      'En reserva' => 'warning',
      'Inscrito' => 'success',
    ];    
  @endphp
  <x-layout.bar>
    <x-search name="search" placeholder="Buscar curso..." value="{{ $search }}"/>
  </x-layout.bar>
  <div class="container-fluid px-2">
    @if ($enrollments->isNotEmpty())
      <div class="row px-sm-5" style="row-gap: 1rem;">
        @foreach ($enrollments as $enrollment)
          @php
            $course = $enrollment->course;
            $approvalColor = $approvalColors[$enrollment->approval];
            $confirmationColor = $confirmationColors[$enrollment->status]
          @endphp
          <div class="col-md-6">
            <x-course.alt-card :course="$course">
              <p class="mb-0">
                Estado del cupo: <b class="text-{{ $confirmationColor }}">{{ $enrollment->status }}</b> 
              </p>
              <p class="mb-0">
                Solvencia: <b>{{ $enrollment->solvency }}</b> 
              </p>
              @if ($course->phase === 'Inscripciones' && $enrollment->status === 'En reserva')
                <p class="mb-0">
                  Expiración de reserva: <b>{{ $enrollment->expires_at->format(DF) }}</b>
                </p>
              @endif
              @if ($course->phase !== 'Inscripciones')
                <p class="mb-0">
                  Aprobación: <b class="text-{{ $approvalColor }}">{{ $enrollment->approval }}</b>
                </p>
              @endif
              <div class="d-flex align-items-center gap-1 mt-3">
                @if ($enrollment->approval === 'Aprobado' && $enrollment->solvency === 'Solvente')
                  <x-button :url="route('pdf.certificate', $enrollment)" color="success" icon="arrow-down">
                    Certificado
                  </x-button>
                @endif
                <x-button :url="route('users.enrollments.show', $enrollment)" icon="list-ul">
                  Detalles
                </x-button>
              </div>
            </x-course.alt-card>
          </div>
        @endforeach
      </div>
    @else
      <div class="empty-container flex-column">
        <h2 class="empty">No te has inscrito en ningún curso</h2>
        @can('role', 'Estudiante')
          <a class="text-primary" href="{{ route('available-courses.index') }}">
            Ver cursos disponibles
          </a>
        @endcan
      </div>
    @endif
  </div>
</x-layout.main>