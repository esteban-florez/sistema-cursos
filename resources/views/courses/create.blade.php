<x-layout.main title="Registrar Curso">
  <section class="container-fluid">
    <div class="card mx-sm-3">
      <div class="card-body">
        <x-course-form 
          :action="route('courses.store')" 
          :instructors="$instructors"
          :areas="$areas"
        />
      </div>
    </div>
  </section>
</x-layout.main>