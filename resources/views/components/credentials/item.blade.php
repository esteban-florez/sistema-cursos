@props(['value'])

<li class="list-group-item">
  <div class="d-flex justify-content-between gap-2">
    <h6 class="m-0 text-primary">{{ $slot }}</h6>
    <p class="m-0 text-break text-right">{{ $value }}</p>
  </div>
</li>