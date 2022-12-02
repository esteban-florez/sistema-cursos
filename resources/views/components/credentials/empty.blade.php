@props(['target', 'title'])

<div class="col-sm-6">
  <div class="card">
    <div class="card-header bg-dark">
      <div class="d-flex justify-content-between align-items-center gap-2">
        <h3 class="m-0">{{ $title }}</h3>
      </div>
    </div>
    <div class="card-body text-center">
      <h5 class="text-muted text-center w-75 mx-auto mb-3">
        No se han registrado datos de {{ strtolower($title) }}.
      </h5>
      <button class="btn btn-lg btn-success" data-toggle="modal" data-target="#{{ $target }}Create">
        <i class="fas fa-plus"></i>
        <span>Registrar datos</span>
      </button>
    </div>
  </div>
</div>