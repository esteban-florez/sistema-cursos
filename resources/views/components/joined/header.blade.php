@props(['club', 'memberships'])

<div class="title-wrapper">
  <h2 class="h3 mb-0 mr-3 text-break">{{ $club->name }}</h2>
  <p class="m-0 h5">
    {{ $club->members_count }} miembros
  </p>
</div>
<x-button icon="file" hide-text="md" url="#">
  Generar PDF
</x-button>