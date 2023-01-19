<x-layout.main title="Editar club">
  <section class="container-fluid">
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