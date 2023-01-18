<x-layout.main title="Registrar usuario">
  @push('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
  @endpush
  <section class="container-fluid pb-1">
    <div class="card px-3 pt-2 pb-3">
      <x-user-form 
        :areas="$areas"
        :action="route('users.store')"
        :pnfs="$pnfs"
        image
      />
    </div>
  </section>
</x-layout.main>