@props(['hidden' => ''])

<form method="GET">
  {{ $hidden }}
  <div class="input-group">
    <input autcomplete="off" class="form-control" type="search" {{ $attributes }}>
    <div class="input-group-append">
      <button class="btn btn-dark" type="submit">
        <i class="fas fa-search"></i>
      </button>
    </div>
  </div>
</form>