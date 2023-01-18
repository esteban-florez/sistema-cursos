<x-layout.main title="Inicio">
  {{-- TODO -> ver que titulo se le pone, por ahora se quedó inicio --}}
  @push('css')
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">
  @endpush
  @push('js')
  <script defer src="{{ asset('js/time.js') }}"></script>
  @endpush

  <!-- Hay muchas cosas que arreglar aquí en el home, pero, yastoi harta ptm jasjajskajk -->

  <!-- TODO -> Hacer que me lleve a los detalles de todas las cards -->
  <!-- TODO -> Agregar la relación con pagos, para que se muestren los de verificar y así -->
  <!-- TODO -> Desglozar partes en varios componentes, mucho código -->
  <!-- TODO -> Hacer que funcionen bien las cards, osea que agarren realmente los ultimos cursos -->

  @is('Estudiante')
  <section class="container fluid px-sm-4">
    <div class="row w-100 mt-2 ml-0">
      <div class="col-lg-7">
        <div class="card w-100 d-md-inline-block d-none mb-3 p-3">
          <h4 class="text-center mt-2">Bienvenid@ {{ auth()->user()->full_name }}</h4>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="card w-100 d-md-inline-block d-none">
          <div class="card-body d-flex flex-column justify-content-center align-items-center py-2">
            <h3 class="mb-0" id="time">{{ now()->format(TF) }}</h3>
            <h5 class="mb-1" id="date">{{ now()->format(DF) }}</h5>
          </div>
        </div>
      </div>
    </div>
    <div class="card mb-2 p-3">
      <div class="row d-flex align-items-center w-100">
        <div class="col-sm-9">
          <h2 class="mb-0">¡Últimos cursos!</h2>
        </div>
        <div class="col-sm-3 text-sm-right">
          <a href="{{ route('available-courses.index') }}" class="mt-1">
            <span>Ver más</span>
            <i class="fas fa-arrow-right"></i>
          </a>
        </div>
      </div>
    </div>
    <x-carousel :items="$courses" detailUrl="courses.show"/>
    <div class="card mt-3">
      <div class="card-header">
        <div class="row d-flex align-items-center w-100">
          <div class="col-sm-9">
            <h3 class="mb-0">Clubes destacados</h3>
          </div>
          <div class="col-sm-3 text-sm-right">
            <a href="{{ route('club.index') }}" class="mt-1">
              <span>Ver listado</span>
              <i class="fas fa-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="cards-grid">
          @forelse($clubs as $club)
          <div class="card">
            <div class="row no-gutters">
              <div class="col-sm-5">
                <img class="w-100 rounded-left" src="{{ $club->image }}" alt="Imagen del curso">
              </div>
              <div class="col-sm-7 d-flex align-items-center">
                <div class="card-body">
                  <h5 class="mb-2">{{ $club->name }}</h5>
                  <p class="card-text">{{ $club->excerpt }}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <x-button url="{{ route('club.show', $club->id) }}">Detalles</x-button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @empty
          <div class="empty-container">
            <h2 class="empty">No hay clubs disponibles</h2>
          </div>
          @endforelse
        </div>
      </div>
    </div>
  </section>
  @endis
  @is('Administrador')
  <section class="container fluid px-sm-4">
    <div class="row mt-3">
      <div class="col-md-7">
        <div class="card">
          <div class="card-header">
            <div class="row d-flex align-items-center w-100">
              <div class="col-lg-9">
                <h3 class="mb-0">Pagos pendientes</h3>
              </div>
              <div class="col-lg-3 text-lg-right">
                <a href="{{ route('pending-payments.index') }}" class="mt-1">
                  <span>Ver más</span>
                  <i class="fas fa-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="card-body p-3 payment-container-admin">
            @forelse ($payments as $payment)
              <div class="callout callout-secondary mb-2 p-0">
                <div class="card-body p-2">
                  <h5 class="mb-0 text-success">{{ $payment->full_amount }}</h5>
                  <p class="mb-0"><b>Referencia:</b> {{ $payment->ref ?? '----' }}</p>
                  <p class="mb-0"><b>Fecha:</b> {{ $payment->updated_at->format(DF) }}</p>
                </div>
              </div>
            @empty
              <div class="empty-container">
                <div class="empty">No hay pagos pendientes</div>
              </div>
            @endforelse
          </div>
        </div>
      </div>
      <div class="col-md-5">
        <div class="card w-100 d-md-inline-block d-none mb-0">
          <div class="card-body d-flex flex-column justify-content-center align-items-center py-2">
            <h3 class="mb-0" id="time">{{ now()->format(TF) }}</h3>
            <h5 class="mb-0" id="date">{{ now()->format(DF) }}</h5>
          </div>
        </div>
        <div class="card card-dark mt-md-3">
          <div class="card-header">
            <div class="row d-flex align-items-center w-100">
              <div class="col-12">
                <h5 class="mb-0">Estadísticas generales</h5>
              </div>
              <div class="col-12">
                <a href="#" class="mt-1">
                  <span>Ver más</span>
                  <i class="fas fa-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="card-body stadistics-container p-2">
            <div class="row">
              <div class="col-6">
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3>500</h3>
                    <p class="font-weight-bold mb-2">Total de Usuarios</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-users"></i>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="small-box bg-success">
                  <div class="inner">
                    <h3>12k $</h3>
                    <p class="font-weight-bold mb-2">Total de Ingresos</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-money-bill"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-xlg-6">
        <div class="card">
          <div class="card-header">
            <div class="row d-flex align-items-center w-100">
              <div class="col-sm-9">
                <h3 class="mb-0">Últimos cursos</h3>
              </div>
              <div class="col-sm-3 text-sm-right">
                <a href="{{ route('courses.index') }}" class="mt-1">
                  <span>Ver listado</span>
                  <i class="fas fa-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="cards-grid">
              @forelse($courses as $course)
              <div class="card">
                <div class="row no-gutters">
                  <div class="col-sm-5">
                    <img class="w-100" src="{{ $course->image }}" alt="Imagen del curso">
                  </div>
                  <div class="col-sm-7 d-flex align-items-center">
                    <div class="card-body">
                      <h5 class="mb-2">{{ $course->name }}</h5>
                      <p class="card-text">{{ $course->excerpt }}</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <x-button url="{{ route('courses.show', $course->id) }}">Detalles</x-button>
                        <h4 class="text-success mb-0">{{ $course->total_price }} $</h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @empty
                <div class="empty-container">
                  <h2 class="empty">No hay cursos disponibles</h2>
                </div>
              @endforelse
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-xlg-6">
        <div class="card">
          <div class="card-header">
            <div class="row d-flex align-items-center w-100">
              <div class="col-sm-9">
                <h3 class="mb-0">Últimos clubes</h3>
              </div>
              <div class="col-sm-3 text-sm-right">
                <a href="{{ route('club.index') }}" class="mt-1">
                  <span>Ver listado</span>
                  <i class="fas fa-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="cards-grid">
              @forelse($clubs as $club)
              <div class="card">
                <div class="row no-gutters">
                  <div class="col-sm-5">
                    <img class="w-100 rounded-left" src="{{ $club->image }}" alt="Imagen del curso">
                  </div>
                  <div class="col-sm-7 d-flex align-items-center">
                    <div class="card-body">
                      <h5 class="mb-2">{{ $club->name }}</h5>
                      <p class="card-text">{{ $club->excerpt }}</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <x-button url="{{ route('club.show', $club->id) }}">Detalles</x-button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @empty
              <div class="empty-container">
                <h2 class="empty">No hay clubs disponibles</h2>
              </div>
              @endforelse
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endis
</x-layout.main>