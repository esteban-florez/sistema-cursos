<x-layout.main title="Perfil">
  @push('css')
    <link rel="stylesheet" href="{{ asset('css/perfil.css') }}">
  @endpush
  <x-profile :user="$user"></x-profile>
</x-layout.main>