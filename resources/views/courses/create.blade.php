<x-layout.main title="Registrar curso">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('courses.create') }}
  </x-slot>
  <section class="container-fluid">
    <x-alert />
    <div class="card mx-sm-3">
      <div class="card-body">
        @can('create', App\Models\Course::class)
          <x-course-form 
            :action="route('courses.store')"
            :instructors="$instructors"
            :areas="$areas"
            :pnfs="$pnfs"
          />
        @endcan
      </div>
    </div>
  </section>
</x-layout.main>