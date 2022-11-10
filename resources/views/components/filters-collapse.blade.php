<div class="collapse" id="filtersCollapse">
  <hr class="mt-0">
  <form method="GET" class="container-fluid">
    <input type="hidden" name="search" value="{{ request('search') }}">
    <div class="row">
      <div class="col-md-6 px-5">
        <h4>Filtrar por: </h4>
        {{ $filters }}
      </div>
      <div class="col-md-6 px-5">
        <h4>Ordenar por: </h4>
        {{ $sorts }}
      </div>
    </div>
    <div class="px-5 pb-3">
      <x-button type="submit">
        Aceptar
      </x-button>
      <x-button :url="route(Route::currentRouteName())" color="secondary">
        Resetear
      </x-button>
    </div>
  </form>
</div>