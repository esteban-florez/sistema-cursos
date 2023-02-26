<x-layout.main title="Inicio">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('home') }}
  </x-slot>
  @push('css')
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">
  @endpush

  <section class="container fluid px-sm-4">
    <div class="row mt-3">
      <div class="col-md-7">
        <x-home.card color="dark" col="lg-3" aling="lg-right" title="Pagos pendientes" :url="route('pending-payments.index')">
          @forelse ($payments as $payment)
            <x-home.payment :payment="$payment" />
          @empty
            <div class="empty-container" style="height: 13.2rem">
              <h2 class="empty">Actualmente no hay pagos pendientes</h2>
            </div>
          @endforelse
        </x-home.card>
      </div>
      <div class="col-md-5">
        <x-time hideHour='md'/>
        <x-home.card col="12" aling="left" title="Estadísticas">
          <x-home.card-stadistic />
        </x-home.card>
      </div>
    </div>
    <x-home.card color="dark" col="lg-3" aling="lg-right" title="Ultimos cursos" :url="route('courses.index')">
      <div class="cards-grid px-2">
        @forelse($courses as $course)
          <div class="py-2">
            <x-course.alt-card :course="$course">
              <p class="text-truncate">{{ $course->description }}</p>
              <div class="d-flex justify-content-between align-items-center">
                <x-button url="{{ route('courses.show', $course->id) }}">Detalles</x-button>
                <div>
                  <h4 class="text-success mb-0 text-right">{{ $course->total_amount }}</h4>
                  @if ($course->hasReserv())
                    <h5 class="mb-0 h6 text-right">Reservación: {{ $course->reserv_amount }}</h5>
                  @endif
                </div>
              </div>
            </x-course.alt-card>
          </div>
        @empty
          <div class="empty-container">
            <h2 class="empty">No hay cursos disponibles</h2>
          </div>
        @endforelse
      </div>
    </x-home.card>
    <x-home.card color="dark" col="lg-3" aling="lg-right" title="Ultimos clubes" :url="route('clubs.index')">
      <div class="cards-grid px-2">
        @forelse($clubs as $club)
          <x-home.club :club="$club" />
        @empty
          <div class="empty-container">
            <h2 class="empty">No hay clubs disponibles</h2>
          </div>
        @endforelse
      </div>
    </x-home.card>
  </div>
</x-layout.main>