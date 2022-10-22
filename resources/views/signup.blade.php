<x-layout.app-alt title="Registrarse">
  @push('css')
    <link rel="stylesheet" href="{{ asset('css/registro.css') }}">
  @endpush
  @push('js')
    <script defer src="{{ asset('js/fixOverlay.js') }}"></script>
  @endpush
  <body class="hold-transition register-page">
    <div class="overlay"></div>
    <div class="register-box">
      <x-circle-logo />
      <div class="register-logo">
        <a class="text-white" href="#">
          <h1 class="font-weight-normal">Registro de usuario</h1>
        </a>
      </div>
      <div class="card">
        <div class="card-body register-card-body">
          <form action="{{ route('users.store') }}" method="POST">
            <div class="d-flex justify-content-between align-items-center">
              <h2>Datos de usuario</h2>
              <a class="pb-3" href="{{ route('login') }}">¿Ya posees una cuenta? Inicia sesión</a>
            </div>
            <p class="text-muted">
              Todos los campos son obligatorios.
            </p>
            <div class="container-fluid">
              <div class="row">
                <div class="mb-3 col-md-6">
                  <label for="usernameInput">Nombre de usuario: </label>
                  <input type="text" class="form-control" placeholder="Nombre de usuario" name="username" id="usernameInput" required>
                </div>
                <div class="mb-3 col-md-6">
                  <label for="passwordInput">Contraseña: </label>
                  <input type="password" class="form-control" placeholder="Contraseña" id="passwordInput" name="password" required>
                </div>
              </div>
              <hr>
              <h2>Datos personales</h2>
              <div class="row">
                <div class="mb-3 col-md-6">
                  <label for="namesInput">Nombres: </label>
                  <input type="text" class="form-control" placeholder="Nombres" name="names" id="namesInput" required>
                </div>
                <div class="mb-3 col-md-6">
                  <label for="lastnamesInput">Apellidos: </label>
                  <input type="text" class="form-control" placeholder="Apellidos" name="lastnames" id="lastnamesInput" required>
                </div>
                <div class="mb-3 col-md-6">
                  <label for="birthInput">Fecha de nacimiento: </label>
                  <input type="date" class="form-control" placeholder="Fecha de nacimiento" name="birth" id="birthInput" required>
                </div>
                <div class="mb-3 col-md-6">
                  <label for="genderSelect">Sexo: </label>
                  <select name="gender" class="form-control" placeholder="Sexo" id="genderSelect" required>
                    <option selected>Seleccionar...</option>
                    <option value="male">Hombre</option>
                    <option value="female">Mujer</option>
                  </select>
                </div>
                <div class="mb-3 col-md-6">
                  <label for="ciInput">Cédula: </label>
                  <div class="d-flex ci-wrapper">
                    <select class="form-control" name="citype" required>
                      <option value="v">V-</option>
                      <option value="e">E-</option>
                    </select>
                    <input class="form-control" type="number" name="ci" placeholder="Cédula de Identidad" id="ciInput" required>
                  </div>
                </div>
                <div class="mb-3 col-md-6">
                  <label for="emailInput">Correo Electrónico: </label>
                  <input class="form-control" type="email" name="email" placeholder="Correo Electrónico" id="emailInput" required>
                </div>
                <div class="mb-3 col-md-6">
                  <label for="phoneInput">Número de Teléfono: </label>
                  <input class="form-control" type="text" name="phone" placeholder="Numero de Teléfono" id="phoneInput" required>
                </div>
                <div class="mb-3 col-md-6">
                  <label for="gradeSelect">Grado de Instrucción: </label>
                  <select class="form-control" name="grade" required>
                    <option selected>Seleccionar...</option>
                    <option value="basic">Primaria</option>
                    <option value="middle">Bachillerato</option>
                    <option value="tsu">TSU</option>
                    <option value="pregrade">Pregrado</option>
                  </select>
                </div>
                <div class="mb-3 col-12">
                  <label for="addressTextarea">Dirección: </label>
                  <textarea class="form-control" name="address" placeholder="Dirección" id="addressTextarea"></textarea>
                </div>
              </div>
              <x-button type="submit" class="btn-lg btn-block">Registrarse</x-button>
            </div>
          </form>
        </div>
      </div>
    </div>
    {{-- <script>
      const overlay = document.querySelector('.overlay');
      const height = document.computedStyle;
      overlay.style.height = `${height}px`;
    </script> --}}
  </body>
</x-layout.app-alt>