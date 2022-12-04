@props(['title', 'target'])

<div class="col-sm-6">
  <div class="card">
    <div class="card-header bg-dark">
      <div class="d-flex justify-content-between align-items-center gap-2">
        <h3 class="m-0">{{ $title }}</h3>
        <x-button color="light" icon="pen" data-toggle="modal" data-target="#{{ $target }}Edit">
          Actualizar
        </x-button>
      </div>
    </div>
    <div class="card-body">
      <ul class="list-group">
        {{ $slot }}
      </ul>
    </div>
  </div>
</div>