<x-layout.main title="Editar estudiante">
  @push('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
  @endpush
  <section class="container-fluid pb-1">
    <div class="card px-3 pt-2 pb-3">
      <x-user-form
        type="student"
        :action="route('students.update', $student->id)"
        :user="$student"
        image
        edit
      />
    </div>
  </section>
</x-layout.main>