<x-layout.main title="Inicio">
  {{-- TODO -> ver que titulo se le pone, por ahora se quedó inicio --}}
  @push('css')
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">
  @endpush

  <section class="container fluid px-sm-4">
    <div class="row mt-3">
      <div class="col-md-7">
        <x-home.card color="dark" col="lg-3" aling="lg-right" title="Pagos pendientes" :url="route('pending-payments.index')">
          @forelse ($payments as $payment)
            <x-home.payment :payment="$payment">
            </x-home.payment>
          @empty
            <div class="empty-container">
              <h2 class="empty">Actualmente no hay pagos pendientes</h2>
            </div>
          @endforelse
        </x-home.card>
      </div>
      <div class="col-md-5">
        <x-time hideHour='md'/>
        <x-home.card col="12" aling="left" title="Estadísticas">
          <x-home.card-stadistic/>
        </x-home.card>
      </div>
      <div class="col-12 col-xlg-6">
        <x-home.card color="dark" col="lg-3" aling="lg-right" title="Ultimos cursos" :url="route('courses.index')">
          <div class="cards-grid px-2">
            @forelse($courses as $course)
              <x-home.course :course="$course">
              </x-home.course>
            @empty
              <div class="empty-container">
                <h2 class="empty">No hay cursos disponibles</h2>
              </div>
            @endforelse
          </div>
        </x-home.card>
      </div>
      <div class="col-12 col-xlg-6">
        <x-home.card color="dark" col="lg-3" aling="lg-right" title="Ultimos clubes" :url="route('clubs.index')">
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
      </div>
    </div>
  </div>
</x-layout.main>