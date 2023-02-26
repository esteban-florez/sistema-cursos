<x-layout.main title="Inicio">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('home') }}
  </x-slot>
  @push('css')
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">
  @endpush

  <section class="container-fluid px-sm-4">
    <x-home.index 
      :payments=$payments
      :user=$user
      :courses=$courses
      :clubs=$clubs
    />
  </section>
</x-layout.main>