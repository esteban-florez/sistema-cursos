<x-layout.main title="Editar club">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('clubs.edit', $club) }}
  </x-slot>
  <section class="container-fluid">
    <x-alert />
    <div class="card mx-sm-3">
      <div class="card-body">
        <x-club-form 
          :action="route('clubs.update', $club->id)" 
          :instructors="$instructors"
          :club="$club"
          edit
        />
      </div>
    </div>
  </section>
</x-layout.main>