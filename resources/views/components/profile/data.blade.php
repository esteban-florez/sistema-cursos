@props(['data'])

<li>
  <h5 class="mb-0 h6 text-muted">{{ $slot }}</h5>
  <h6 class="text-truncate fw-normal">{{ $data }}</h6>
</li>