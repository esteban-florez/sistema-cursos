<x-layout.app-alt title="Nueva Contraseña">
  @push('js')
    <script defer src="{{ asset('js/newPassword.js') }}"></script>
  @endpush
  <body class="login-page h-100">
    <div class="overlay"></div>
    <div class="login-box my-3">
      <x-circle-logo />
      <div class="login-logo">
        <h1 class="text-white font-weight-normal">Crear nueva contraseña</h1>
      </div>
      <div class="card">
        <div class="card-body login-card-body">
          <span class="badge bg-info help-pass float-right" data-toggle="tooltip" title="La contraseña debe tener entre 8 y 20 caracteres, y debe ser una combinación de mayúsculas, minúsculas, números y símbolos.">?</span>
          <p class="login-box-msg pb-2">Por favor ingrese su nueva contraseña.</p>
          <form action="{{ route('password.reset') }}" method="POST">
            @csrf
            <input type="hidden" name="email" value="{{ $email }}">
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="input-group mb-3">
              <input class="form-control" id="password" type="password" name="password" placeholder="Ingresa la contraseña..." minlength="8" maxlength="20" required>
              <div class="input-group-append">
                <button class="btn bg-white btn-outline-light" type="button" style="width: 3rem;">
                  <span class="fas fa-eye"></span>
                </button>
              </div>
            </div>
            <div class="input-group mb-3">
              <input class="form-control" id="passwordConfirmation" type="password" name="password_confirmation" placeholder="Confirma la contraseña..." minlength="8" maxlength="20" required>
              <div class="input-group-append">
                <button class="btn bg-white btn-outline-light" type="button" style="width: 3rem;">
                  <span class="fas fa-eye"></span>
                </button>
              </div>
            </div>
            <x-button type="submit" class="btn-block">
              Restablecer contraseña
            </x-button>
          </form>
          <hr>
          <div class="d-flex justify-content-center">
            <a href="{{ route('login') }}">
              Volver
            </a>
          </div>
          @error('email')
            <p>{{$errors->first()}}</p>
          @enderror
        </div>
      </div>
    </div>
  </body>
</x-layout.app-alt>
