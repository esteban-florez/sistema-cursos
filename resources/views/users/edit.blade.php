<x-layout.main title="Editar usuario">
  @push('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
  @endpush
  <section class="container-fluid pb-1">
    <div class="card px-3 pt-2 pb-3">
      <x-user-form
        :type="null"
        :areas="$areas"
        :action="route('users.update', $user->id)"
        :user="$user"
        :pnfs="$pnfs"
        image
        edit
      />
    </div>
  </section>
</x-layout.main>