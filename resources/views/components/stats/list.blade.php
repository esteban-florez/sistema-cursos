@props(['title'])

<div class="card card-dark">
  <div class="card-header">
    <h4 class="mb-0">{{ $title }}</h4>
  </div>
  <div class="flex-column p-2">
    {{ $slot }}
  </div>
</div>