@props(['club', 'body' => null])

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
  </div>
  <div class="card-body">
    {{ $slot }}
  </div>
</div>