<x-layout.main title="Inicio">
  {{-- TODO -> ver que titulo se le pone, por ahora se quedó inicio --}}
  @push('css')
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">
  @endpush
  @push('js')
  <script defer src="{{ asset('js/time.js') }}"></script>
  @endpush

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
            <a href="{{ route('clubs.index') }}" class="mt-1">
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
                    <x-button url="{{ route('clubs.show', $club->id) }}">Detalles</x-button>
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
</x-layout.main>