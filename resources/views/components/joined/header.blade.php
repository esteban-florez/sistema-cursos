@props(['club', 'memberships'])

<div class="title-wrapper">
  <h2 class="h3 mb-0 mr-3 text-break">Club de {{ $club->name }}</h2>
  <p class="m-0 h5">
    Miembros: {{ $club->members_count }}
  </p>
</div>
<x-button icon="file-download" hide-text="md" url="#">
  Generar PDF
</x-button>