<x-layout.main title="Editar usuario">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('users.edit', $user) }}
  </x-slot>
  @push('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
  @endpush
  <section class="container-fluid pb-1 px-sm-4">
    <div class="card px-3 pt-2 pb-3">
      <x-user-form
        :areas="$areas"
        :action="route('users.update', $user->id)"
        :pnfs="$pnfs"
        :user="$user"
        edit
      />
    </div>
  </section>
</x-layout.main>