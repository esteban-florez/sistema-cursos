<x-layout.main title="Registrar club">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('clubs.create') }}
  </x-slot>
  <section class="container-fluid">
    <div class="card mx-sm-3">
      <div class="card-body">
        <x-club-form 
          :action="route('clubs.store')" 
          :instructors="$instructors"
        />
      </div>
    </div>
  </section>
</x-layout.main>