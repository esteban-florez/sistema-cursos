<x-layout.app-alt title="Restauración del sistema">
  @push('js')
    <script defer src="{{ asset('js/backup-label.js') }}"></script>
  @endpush
  <body class="login-page h-100">
    <div class="overlay"></div>
    <div class="login-box my-3" style="width: 25rem;">
      <x-circle-logo />
      <div class="login-logo">
        <h1 class="text-white font-weight-normal">
          Restauración del sistema
        </h1>
      </div>
      <div class="card">
        <div class="card-body login-card-body">
          <p class="text-center pb-2">
            Para restaurar el sistema debe ingresar las credenciales de la base de datos.
          </p>
          <form action="{{ route('system-restore.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <x-field name="username" id="username" placeholder="Escribe el nombre de usuario..." required>
              Nombre de usuario:
            </x-field>
            <x-field type="password" name="password" id="password" placeholder="Escribe la contraseña..." required>
              Contraseña:
            </x-field>
            <i class="mr-1 fas fa-asterisk text-danger"></i>
            <label for="backup">Respaldo</label>
            <div class="custom-file mb-3">
              <input type="file" class="custom-file-input" name="backup" id="backup" required>
              <label class="custom-file-label" for="backup" id="backupLabel">Subir respaldo</label>
              @error('backup')
                <p class="text-danger">{{ ucfirst($message) }}</p>
              @enderror
            </div>
            <x-button type="submit" class="btn-block">
              Aceptar
            </x-button>
          </form>
          <hr>
          <div class="d-flex justify-content-center">
            <a href="{{ route('login') }}">
              Volver
            </a>
          </div>
        </div>
      </div>
    </div>
  </body>
</x-layout.app-alt>
