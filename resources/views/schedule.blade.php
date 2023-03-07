<x-layout.main title="Horario">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('schedule', $user) }}
  </x-slot>
  @push('css')
    <link rel="stylesheet" href="{{ asset('css/timetablejs.css') }}">
    <link rel="stylesheet" href="{{ asset('css/schedule.css') }}">
  @endpush
  @push('js')
    <script defer src="{{ asset('js/timetable.js') }}"></script>
    <script defer src="{{ asset('js/schedule.js') }}"></script>
  @endpush
  <section class="container-fluid">
    <div class="empty-container">
      <h2 class="empty">No hay ningún evento que mostrar.</h2>
    </div>
    <div class="timetable" data-url="{{ route('api.schedule', auth()->user()) }}">
    </div>
    </section>
</x-layout.main>