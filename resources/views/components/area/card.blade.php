{{-- TODO -> cambiar diseño de la card para que incluya links a instructores y cursos del area en cuestión --}}

<div class="col-sm-6 col-md-4 mb-3">
  <div class="card h-100">
    <div class="card-body">
      <div class="area-card">
        <div class="area-title">
          <h3 class="m-0">{{ Str::ucfirst($area->name) }}</h3>
          <p class="m-0">PNF:  
            <span class="font-weight-bold">
              {{ $area->pnf->name }}
            </span>
          </p>
        </div>
        <div class="area-buttons">
          <x-button :url="route('areas.edit', $area->id)" icon="edit">Editar</x-button>
          <form method="POST" action="{{ route('areas.destroy', $area->id) }}">
            @csrf
            @method('DELETE')
            <x-button type="submit" icon="trash-alt" color="danger">Eliminar</x-button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
