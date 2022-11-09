<a href="{{ $url }}" class="dropdown-item">
  <div class="media">
    <div class="media-body">
      <h3 class="dropdown-item-title">
        {{ $title }}
        <span class="float-right text-sm">
          <i class="fas fa-times"></i>
        </span>
      </h3>
      <p class="text-sm">{{ $subtitle }}</p>
      <p class="text-sm text-muted">
        <i class="far fa-clock mr-1">
          {{-- TODO -> make timestamp work --}}
          Hace 5 horas
        </i>
      </p>
    </div>
  </div>
</a>