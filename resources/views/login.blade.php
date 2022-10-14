<x-layout-alt title="Iniciar Sesión">
  <body class="hold-transition login-page">
    <div class="overlay"></div>
    <div class="login-box my-3">
    <div class="bg-white rounded-circle logo-container my-2 shadow">
      <img width="60" height="60" src="{{ asset('img/logo-upta.png') }}">
    </div>
    <div class="login-logo">
      <a class="text-white" href="#">
      <h1 class="font-weight-normal">Iniciar Sesión</h1>
      </a>
    </div>
    <div class="card">
      <div class="card-body login-card-body">
      <form action="{{ route('auth') }}" method="POST">
        @csrf
        <div class="input-group mb-3">
        <input type="email" class="form-control" placeholder="Corre Electrónico" name="email">
        <div class="input-group-append">
          <div class="input-group-text">
          <i class="fa fa-user"></i>
          </div>
        </div>
        </div>
        <div class="input-group mb-3">
        <input type="password" class="form-control" placeholder="Contraseña" name="password">
        <div class="input-group-append">
          <div class="input-group-text">
          <i class="fa fa-key"></i>
          </div>
        </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
      </form>
      <hr>
      <div class="social-auth-links text-center mb-3">
        <a href="/registro.html" class="btn btn-block btn-success">
        ¿No tienes una cuenta? Regístrate.
        </a>
      </div>
      <div class="d-flex justify-content-center">
        <a class="text-center" href="/olvido-contraseña.html">Olvidé mi contraseña.</a>
      </div>
      </div>
    </div>
    </div>
  </body>
</x-layout-alt>