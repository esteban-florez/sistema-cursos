@props(['payments', 'user', 'courses', 'clubs'])

@isnt('Administrador')
  <div class="row">
    @if ($payments->isNotEmpty() && $user->payments()->unfulfilled())
      <div class="col-12 col-lg-6">
        <x-home.card color="dark" col="12" title="Cuotas restantes" :url="route('unfulfilled-payments.index', ['user' => $user])">
          @foreach ($payments as $payment)
            <x-home.unfulfilled :payment=$payment />
          @endforeach
        </x-home.card>
      </div>
      <div class="col-6 d-lg-inline-block d-none">
        <div class="card w-100 mb-2">
          <div class="bienvenido my-2">
            <h4 class="text-center mt-2">¡Hola {{ $user->full_name }}!</h4>
          </div>
        </div>
        <x-time hideHour='lg'/>
      </div>
    @else
      <div class="col-6 d-lg-inline-block d-none">
        <div class="card w-100 mb-3">
          <div class="bienvenido">
            <h4 class="text-center mt-2">¡Hola {{ $user->full_name }}!</h4>
          </div>
        </div>
      </div>
      <div class="col-6">
        <x-time hideHour='lg'/>
      </div>
    @endif
  </div>
@endis
@is('Administrador')
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
@endis
@is('Estudiante')
  <x-home.card color="dark" col="lg-3" aling="lg-right" title="¡Últimos cursos!" :url="route('available-courses.index')">
    <x-carousel :items="$courses" detailUrl="courses.show"/>
  </x-home.card>
@endis
@isnt('Estudiante')
  <x-home.card color="dark" col="lg-3" aling="lg-right" title="¡Últimos cursos!" :url="route('courses.index')">
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
@endis
@php
  $clubsRoute = auth()->user()->can('viewAny', App\Models\Club::class)
    ? 'clubs.index' : 'available-clubs.index';
@endphp
<x-home.card color="dark" col="md-3" aling="md-right" title="Ultimos clubes" :url="route($clubsRoute)">
  <div class="cards-grid px-2">
    @forelse($clubs as $club)
      <x-home.club :club="$club"/>
    @empty
      <div class="empty-container">
        <h2 class="empty">No hay clubs disponibles</h2>
      </div>
    @endforelse
  </div>
</x-home.card>
