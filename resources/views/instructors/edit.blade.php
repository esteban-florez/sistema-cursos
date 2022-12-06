<x-layout.main title="Editar instructor">
  @push('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
  @endpush
  <section class="container-fluid pb-1">
    <div class="card px-3 pt-2 pb-3">
      <x-user-form
        type="instructor"
        :areas="$areas"
        :action="route('instructors.update', $instructor->id)"
        :user="$instructor"
        :pnfs="$pnfs"
        image
        edit
      />
    </div>
  </section>
</x-layout.main>