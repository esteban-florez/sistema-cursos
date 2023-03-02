<x-layout.main :title="$membership->club->name">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('users.memberships.show', $membership) }}
  </x-slot>
  @push ('css')
    <link rel="stylesheet" href="{{ asset('css/detalles.css') }}">
  @endpush

  {{-- Creo que voy a terminar quitando esto, no se man --}}
  <section class="container-fluid px-3 px-lg-4">
    <div class="row">
      <div class="col-12">
        <img src="{{ asset($membership->club->image) }}" 
          class="details-img rounded elevation-2" 
          alt="Imagen del curso: {{ $membership->club->name }}"
        >
      </div>
    </div>
    <x-club.details 
      :club="$club" 
      join
    />
  </section>
</x-layout.main>