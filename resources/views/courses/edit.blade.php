<x-layout.main title="Editar curso">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('courses.edit', $course) }}
  </x-slot>
  <section class="container-fluid">
    <x-alert />
    <div class="card mx-sm-3">
      <div class="card-body">
        @can('update', $course)
          <x-course-form 
            :action="route('courses.update', $course)"
            :instructors="$instructors"
            :areas="$areas"
            :course="$course"
            :pnfs="$pnfs"
            edit
          />
        @endcan
      </div>
    </div>
  </section>
</x-layout.main>