<x-layout.main title="Registrar instructor">
  @push('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
  @endpush
  <section class="container-fluid pb-1">
    <div class="card px-3 pt-2 pb-3">
      <x-user-form 
        type="instructor"
        :areas="$areas"
        :action="route('instructors.store')"
        image
      />
    </div>
  </section>
  
</x-layout.main>