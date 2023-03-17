<x-layout.app-alt title="Recuperación de Contraseña">
  <body class="login-page h-100">
    <div class="overlay"></div>
    <div class="login-box my-3">
      <x-circle-logo />
      <div class="login-logo">
        <h1 class="font-weight-normal text-white">¿Olvidó su contraseña?</h1>
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
          <p class="login-box-msg">Por favor ingrese su correo electrónico para recibir un código de verificación.</p>
          <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <x-input-group type="email" name="email" id="email" placeholder="Correo electrónico" minlength="6" maxlength="50" required>
              <x-slot name="append">
                <button class="btn bg-white btn-outline-light" type="button" style="width: 3rem;">
                  <span class="fa fa-envelope"></span>
                </button>
              </x-slot>
            </x-input-group>
            @error('email')
              <p class="text-danger">{{ ucfirst($message) }}</p>
            @enderror
            <x-button class="btn-block" type="submit">Enviar correo</x-button>
          </form>
          <hr>
          <div class="d-flex justify-content-center">
            <a class="d-inline-block mx-auto" href="{{ route('login') }}">Iniciar Sesión</a>
          </div>
        </div>
      </div>
    </div>
  </body>
</x-layout.app-alt>

