@props(['club', 'body' => null])

@php
  $statusColor = [
    'Activo' => 'success', 
    'Inactivo' => 'secondary', 
  ];
  $statusColor = $statusColor[$club->status];
@endphp

<div class="card h-100 m-0">
  <div class="card-img-top">
    <img  
      class="w-100 img-cover"
      src="{{ asset($club->image) }}"
      alt="Imagen del Club: {{$club->name }}"
      style="height: 10rem;">
  </div>
  <div class="card-header">
    <h4 class="mb-0">{{ $club->name }}</h4>
    <h6 class="mb-0 text-{{ $statusColor }}">
      Estado actual: {{ $club->status }}
    </h6>
  </div>
  <div class="card-body">
    {{ $slot }}
  </div>
</div>