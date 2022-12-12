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
          <div class="alert alert-primary" role="alert">
            {{session('status') === 'passwords.sent' ? 'El link se ha enviado a su correo' : 'Hubo un error en el envío del correo, intente mas tarde'}}
          </div>
        @endif
        <div class="card-body login-card-body">
          <p class="login-box-msg">Por favor ingrese su correo electrónico para recibir un código de verificación.</p>
          <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <div class="input-group mb-3">
              <input autocomplete="off" class="form-control" type="email" name="email" placeholder="Correo electrónico">
              <div class="input-group-append">
                <div class="input-group-text bg-white">
                  <span class="fa fa-envelope"></span>
                </div>
              </div>
            </div>
            <x-button class="btn-block" type="submit">Enviar correo</x-button>
          </form>
          <hr>
          <div class="d-flex justify-content-center">
            <a class="d-inline-block mx-auto" href="{{ route('login') }}">Iniciar Sesión</a>
          </div>
          @error('email')
            <p>{{$errors->first()}}</p>
          @enderror
        </div>
      </div>
    </div>
  </body>
</x-layout.app-alt>

