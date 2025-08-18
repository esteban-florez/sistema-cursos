<x-layout.main title="Base de datos">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('backups') }}
  </x-slot>
  @push('js')
    <script defer src="{{ asset('js/backup.js') }}"></script>
    <script defer src="{{ asset('js/backup-label.js') }}"></script>
  @endpush
  <section class="container-fluid">
    <x-alert />
    <x-errors />
    <div class="row">
      <div class="col-md-4">
        <div class="card mt-2">
          <div class="card-body">
            <h2>Sistema de Cursos</h2>
            <p class="alert alert-info">
              <b>Nota:</b>
              Los respaldos de la base de datos están programados para realizarse de forma automática todos los días a la 1:00 AM.
            </p>
            <x-button :url="route('backups.generate')" class="w-100 btn-lg" color="success" icon="plus">
              Crear nuevo respaldo
            </x-button>
            <hr>
            <h4>Subir un archivo de respaldo</h4>
            <p class="alert alert-danger">
              <b>Nota:</b>
              Es recomendable realizar un nuevo respaldo antes de restaurar la base de datos.
            </p>
            <form class="recover" enctype="multipart/form-data" method="POST" action="{{ route('backups.upload') }}">
              @csrf
              <div class="custom-file mb-3">
                <input type="file" class="custom-file-input" name="backup" id="backup">
                <label class="custom-file-label" for="backup" id="backupLabel">Subir respaldo</label>
                @error('backup')
                  <p class="text-danger">{{ ucfirst($message) }}</p>
                @enderror
              </div>
              <x-button class="btn-lg w-100" icon="file-upload" type="submit" id="upload" disabled>
                Restaurar
              </x-button>
            </form>
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
                    <form class="recover" method="POST" action="{{ route('backups.recover', ['backup' => $backup->name]) }}">
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
  <x-backup-modal />
</x-layout.main>
