<x-layout.main title="Perfil">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('users.show', $user) }}
  </x-slot>
  @push('css')
    <link rel="stylesheet" href="{{ asset('css/perfil.css') }}">
  @endpush
  <x-profile 
    :user="$user" 
    :enrollments="$enrollments"
    :clubs="$clubs"
    />
</x-layout.main>