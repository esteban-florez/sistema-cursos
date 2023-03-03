<x-layout.main title="Editar club">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('clubs.edit', $club) }}
  </x-slot>
  <section class="container-fluid">
    <x-alert />
    <div class="card mx-sm-3">
      <div class="card-body">
        @can('update', $club)
          <x-club-form 
            :action="route('clubs.update', $club)" 
            :instructors="$instructors"
            :club="$club"
            edit
          />
        @endcan
      </div>
    </div>
  </section>
</x-layout.main>