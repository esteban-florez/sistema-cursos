<x-layout.main title="Inicio">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('home') }}
  </x-slot>
  @push('css')
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">
  @endpush

  <section class="container-fluid px-sm-4">
    <div class="row w-100 mt-2">
      <div class="col-lg-6">
        <div class="card w-100 d-lg-inline-block d-none mb-3">
          <div class="bienvenido">
            <h4 class="text-center mt-2">¡Hola {{ auth()->user()->full_name }}!</h4>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <x-time hideHour='lg'/>
      </div>
      <div class="col-12">
        <x-home.card color="dark" col="lg-3" aling="lg-right" title="¡Últimos cursos!" :url="route('available-courses.index')">
          <x-carousel :items="$courses" detailUrl="courses.show"/>
        </x-home.card>
      </div>
      <div class="col-12">
        <x-home.card color="dark" col="md-3" aling="md-right" title="Ultimos clubes" :url="route('clubs.index')">
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
  </section>
  {{-- <section class="container fluid px-sm-4">
    <div class="row w-100 mt-2 ml-0">
      <div class="col-lg-4">
        <div class="card w-100 d-md-inline-block d-none mb-3 p-3">
          <h4 class="text-center mt-2">Bienvenid@ {{ auth()->user()->full_name }}</h4>
        </div>
      </div>
      <div class="col-lg-5">
        <x-time/>
      </div>
      <div class="col-lg-8">
        <x-home.card col="sm-3" aling="sm-right" title="¡Últimos cursos!" :url="route('available-courses.index')">
          <x-carousel :items="$courses" detailUrl="courses.show"/>
        </x-home.card>
      </div>
      <div class="col-lg-4">
        <x-home.card color="dark" col="12" title="Ultimos clubes" :url="route('clubs.index')">
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
  </section> --}}
</x-layout.main>