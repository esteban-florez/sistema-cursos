<x-layout.app-alt title="Iniciar Sesión">
  <body class="hold-transition login-page">
    <div class="overlay"></div>
    <div class="login-box my-3">
      <x-circle-logo />
      <div class="login-logo">
        <h1 class="font-weight-normal text-white">Iniciar Sesión</h1>
      </div>
      <div class="card">
        @if(session('status'))
          <div class="alert alert-primary mb-0" role="alert">
            {{ __(session('status')) }}
          </div>
        @endif
        @if(session('registered'))
          <div class="alert alert-success m-0" role="alert">
            {{ session('registered') }}
          </div>
        @endif
        <div class="card-body login-card-body">
          <form action="{{ route('auth') }}" method="POST">
            @csrf
            @error('email')
              <div class="alert alert-danger" role="alert">
                {{ $message }}
              </div>
            @enderror
            <x-input-group type="email" name="email" id="email" placeholder="Correo Electrónico" minlength="6" maxlength="50">
              <x-slot name="append">
                <span class="input-group-text">
                  <i class="fa fa-user"></i>
                </span>
              </x-slot>
            </x-input-group>
            <x-input-group type="password" name="password" id="password" placeholder="Contraseña" minlength="8" maxlength="20">
              <x-slot name="append">
                <span class="input-group-text">
                  <i class="fa fa-key"></i>
                </span>
              </x-slot>
            </x-input-group>
            <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
          </form>
          <hr>
          <div class="social-auth-links text-center mb-3">
            <x-button :url="route('register.create')" color="success" class="btn-block">
              ¿No tienes una cuenta? Regístrate.
            </x-button>
          </div>
          <div class="d-flex justify-content-center">
            <a class="text-center" href="{{ route('password.forgot') }}">
              Olvidé mi contraseña.
            </a>
          </div>
        </div>
      </div>
    </div>
  </body>
</x-layout.app-alt>