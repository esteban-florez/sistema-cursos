<x-layout.main title="Perfil">
  @isnt('Estudiante')
    <x-slot name="breadcrumbs">
      {{ Breadcrumbs::render('users.show', $user) }}
    </x-slot>
  @endis
  @is('Estudiante')
    <x-slot name="breadcrumbs">
      {{ Breadcrumbs::render('profile') }}
    </x-slot>
  @endis
  @push('css')
    <link rel="stylesheet" href="{{ asset('css/perfil.css') }}">
  @endpush
  <x-profile 
    :user="$user" 
    :enrollments="$enrollments"
    :clubs="$clubs"
    />
</x-layout.main>