<x-layout.main title="Mis cursos">
  @php
    // DRY
    $phasesColors = [
      'Pre-inscripciones' => 'dark',
      'Inscripciones' => 'info',
      'Pre-curso' => 'dark',
      'En curso' => 'success',
      'Finalizado' => 'danger',
    ];
    
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
  <div class="container-fluid">
    <div class="row" style="row-gap: 1rem;">
      @foreach ($enrollments as $enrollment)
        @php
          $course = $enrollment->course;
          $phaseColor = $phasesColors[$course->phase];
          $approvalColor = $approvalColors[$enrollment->approval];
          $confirmationColor = $confirmationColors[$enrollment->status]
        @endphp
        <div class="col-md-6">
          <div class="card h-100 m-0">
            <div class="card-img-top">
              <img  
                class="w-100 img-cover"
                src="{{ asset($course->image) }}"
                alt="Imagen del Curso: {{$course->name }}"
                style="height: 10rem;">
            </div>
            <div class="card-body">
              <h4>{{ $course->name }}</h4>
              <span class="badge badge-{{ $phaseColor }} badge-3 mb-2">
                Fase actual: {{ $course->phase }}
              </span>
              <p class="mb-0">
                Estado del cupo: <b class="text-{{ $confirmationColor }}">{{ $enrollment->status }}</b> 
              </p>
              <p class="mb-0">
                Solvencia: <b>{{ $enrollment->solvency }}</b> 
              </p>
              @if ($course->phase === 'Inscripciones' && $enrollment->status === 'En reserva')
                Expiración de reserva: <b>{{ $enrollment->expires_at->format(DF) }}</b>
              @endif
              @if ($course->phase !== 'Inscripciones')
                <p class="mb-0">
                  Aprobación: <b class="text-{{ $approvalColor }}">{{ $enrollment->approval }}</b>
                </p>
              @endif
              <div class="d-flex align-items-center gap-1 mt-3">
                @if ($enrollment->approval === 'Aprobado' && $enrollment->solvency === 'Solvente')
                  <x-button url="#" color="success" icon="arrow-down">
                    Certificado
                  </x-button>
                @endif
                <x-button :url="route('courses.show', $course->id)" icon="list-ul">
                  Detalles
                </x-button>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</x-layout.main>