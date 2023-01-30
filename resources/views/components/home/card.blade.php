@props(['color' => null, 'col' => null, 'aling' => null, 'title', 'url' => null])

<div class="card card-{{ $color }}">
  <div class="card-header">
    <div class="row d-flex align-items-center w-100">
      <div class="col-lg-9">
        <h4 class="mb-0">{{ $title }}</h4>
      </div>
      <div class="col-{{ $col }} text-{{ $aling }}">
        <a href="{{ $url }}" class="mt-1">
          <span>Ver más</span>
          <i class="fas fa-arrow-right"></i>
        </a>
      </div>
    </div>
  </div>
  <div class="card-body p-1">
    {{ $slot }}
  </div>
</div>