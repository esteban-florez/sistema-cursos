<x-layout.main title="Registrar Curso">
  <section class="container-fluid">
    <x-alerts type="success" icon="check"/>
    <div class="card mx-sm-3">
      <div class="card-body">
        <x-course-form 
          :action="route('courses.store')"
          :instructors="$instructors"
          :areas="$areas"
          :pnfs="$pnfs"
        />
      </div>
    </div>
  </section>
</x-layout.main>