@props(['items', 'detailUrl'])

<div id="carouselIndicators" class="carousel slide" data-ride="carousel" data-interval="7000">
  <ol class="carousel-indicators">
    @forelse ($items as $item)
      <li data-target="#carouselIndicators" data-slide-to="{{ $item->id }}" class="{{ $loop->first ? 'active' : '' }}"></li>
    @empty
      <div class="empty-container">
        <div class="empty">No hay cursos disponibles</div>
      </div>
    @endforelse
  </ol>
  <div class="carousel-inner">
    @foreach ($items as $item)
      <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
        <div class="carousel-text">
          <h5>{{ $item->name }}</h5>
          <x-button :url="route($detailUrl , $item->id)" color="dark" class="btn-sm mb-1">Ver detalles</x-button>
        </div>
        <img src="{{ $item->image }}" class="w-100" alt="{{ $item->name }}">
      </div>
    @endforeach
  </div>
  <button class="carousel-control-prev" type="button" data-target="#carouselIndicators" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
    <span class="sr-only">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-target="#carouselIndicators" data-slide="next">
    <span class="carousel-control-next-icon"></span>
    <span class="sr-only">Next</span>
  </button>
</div>