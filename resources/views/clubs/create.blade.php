<x-layout.main title="Registrar Club">
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