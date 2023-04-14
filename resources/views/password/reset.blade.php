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
        @if(session('status'))
        <div class="alert alert-primary mb-0" role="alert">
          {{ __(session('status')) }}
        </div>
        @endif
        @error('invalid')
          <div class="alert alert-danger mb-0" role="alert">
            {{ $message }}
          </div>
        @enderror
        <div class="card-body login-card-body">
          <x-password-tooltip />
          <p class="login-box-msg pb-2">Por favor ingrese su nueva contraseña.</p>
          <form action="{{ route('password.reset') }}" method="POST">
            @csrf
            <input type="hidden" name="email" value="{{ $email }}">
            <input type="hidden" name="token" value="{{ $token }}">
            <x-input-group type="password" name="password" id="password" placeholder="Ingresa la contraseña..." minlength="8" maxlength="20" required>
              <x-slot name="append">
                <button class="btn bg-white btn-outline-light" type="button" style="width: 3rem;">
                  <span class="fas fa-eye"></span>
                </button>
              </x-slot>
            </x-input-group>
            @error('password')
              <p class="text-danger">{{ ucfirst($message) }}</p>
            @enderror
            <x-input-group type="password" name="password_confirmation" id="passwordConfirmation" placeholder="Ingresa la contraseña..." minlength="8" maxlength="20" required>
              <x-slot name="append">
                <button class="btn bg-white btn-outline-light" type="button" style="width: 3rem;">
                  <span class="fas fa-eye"></span>
                </button>
              </x-slot>
            </x-input-group>
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
        </div>
      </div>
    </div>
  </body>
</x-layout.app-alt>
