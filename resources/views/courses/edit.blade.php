<x-layout.main title="Editar curso">
  <section class="container-fluid">
    <x-alerts type="success" icon="check"/>
    <div class="card mx-sm-3">
      <div class="card-body">
        <x-course-form 
          :action="route('courses.update', $course->id)"
          :instructors="$instructors"
          :areas="$areas"
          :course="$course"
          :pnfs="$pnfs"
          edit
        />
      </div>
    </div>
  </section>
</x-layout.main>