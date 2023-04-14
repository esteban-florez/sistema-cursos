<x-layout.main title="Registrar club">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('clubs.create') }}
  </x-slot>
  <section class="container-fluid">
    <x-alert />
    <div class="card mx-sm-3">
      <div class="card-body">
        @can('create', App\Models\Club::class)
          <x-club-form 
            :action="route('clubs.store')" 
            :instructors="$instructors"
          />
        @endcan
      </div>
    </div>
  </section>
</x-layout.main>