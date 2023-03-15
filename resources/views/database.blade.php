<x-layout.main title="Base de datos">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('database') }}
  </x-slot>
  <section class="container-fluid">
    <x-alert />
    <div class="row">
      <div class="col-md-4">
        <div class="card mt-2">
          <div class="card-body">
            <h2>Vinculación Social</h2>
            <p class="alert alert-info">
              <b>Nota:</b>
              Los respaldos de la base de datos están programados para realizarse de forma automática todos los días a la 1:00 AM.
            </p>
            <x-button :url="route('backups.generate')" class="w-100 btn-lg" color="success" icon="plus">
              Crear nuevo respaldo
            </x-button>
          </div>
        </div> 
      </div>
      <div class="col-md-8">
        @if ($backups->isNotEmpty())
          <div class="list-group mt-2">
            @foreach ($backups as $backup)
              <li class="list-group-item">
                <div class="d-flex w-100 justify-content-between align-items-center">
                  <div>
                    <h5 class="mb-1">{{ $backup->date }}</h5>
                    <p class="mb-1">Tamaño: {{ $backup->size }}</p>
                  </div>
                  <div class="d-flex gap-2">
                    <x-button :url="route('backups.download', ['backup' => $backup->name])" icon="file-download">
                      Descargar
                    </x-button>
                    <form method="POST" action="{{ route('backups.recover', ['backup' => $backup->name]) }}">
                      @csrf
                      @method('PATCH')
                      <x-button color="success" icon="database" type="submit">
                        Restaurar
                      </x-button>
                    </form>
                    <form method="POST" action="{{ route('backups.delete', ['backup' => $backup->name]) }}">
                      @csrf
                      @method('DELETE')
                      <x-button color="danger" icon="trash" type="submite">
                        Eliminar
                      </x-button>
                    </form>
                  </div>
                </div>
              </li>
            @endforeach
          </div>
          @else
            <div class="empty-container">
              <h2 class="empty">Aún no existen respaldos.</h2>
            </div>
        @endif
      </div>
    </div>
  </section>
</x-layout.main>