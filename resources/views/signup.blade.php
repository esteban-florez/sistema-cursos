<x-layout.app-alt title="Registrarse">
  @push('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
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
      <div class="card mb-3">
        <div class="card-body register-card-body">
          <x-select2/>
          <form action="{{ route('register.store') }}" method="POST">
            @csrf
            <div class="container-fluid">
              <h2 class="mb-0">Datos de usuario</h2>
              <p>
                Los campos con <i class="fas fa-asterisk text-danger mx-1"></i> son obligatorios.
              </p>
              <div class="row">
                <div class="col-md-4">
                  <x-field type="email" name="email" id="email" placeholder="email@ejemplo.com" value="{{ old('email') ?? '' }}" required>
                    Correo Electrónico:
                  </x-field>
                </div>
                <div class="col-md-4">
                  <x-password-tooltip/>
                  <x-field type="password" name="password" id="password" placeholder="Escriba la contraseña..." required>
                    Contraseña:
                  </x-field>
                </div>
                <div class="col-md-4">
                  <x-field type="password" name="password_confirmation" id="passwordConfirmation" placeholder="Confirme la contraseña..." required>
                    Confirmar contraseña:
                  </x-field>
                </div>
              </div>
              <hr>
              <div class="container-fluid">
                <h2>Datos personales</h2>
                <div class="row">
                  <div class="col-md-6">
                    <x-field type="text" name="first_name" id="firstName" placeholder="Ej. Esteban" value="{{ old('first_name') ?? '' }}" required>
                      Primer nombre: 
                    </x-field>
                  </div>
                  <div class="col-md-6">
                    <x-field type="text" name="second_name" id="secondName" placeholder="Ej. Andrés" value="{{ old('second_name') ?? '' }}">
                      Segundo nombre: 
                    </x-field>
                  </div>
                  <div class="col-md-6">
                    <x-field type="text" name="first_lastname" id="firstLastname" placeholder="Ej. Florez" value="{{ old('first_lastname') ?? '' }}" required>
                      Primer apellido: 
                    </x-field>
                  </div>
                  <div class="col-md-6">
                    <x-field type="text" name="second_lastname" id="secondLastname" placeholder="Ej. Hernández" value="{{ old('second_lastname') ?? '' }}">
                      Segundo apellido: 
                    </x-field>
                  </div>
                  <div class="col-md-6">
                    <label for="ci">
                      <i class="fas fa-asterisk text-danger mr-1"></i>
                      Cédula: 
                    </label>
                    <div class="d-flex ci-wrapper">
                      <select class="form-control w-25" name="ci_type" required>
                        <option value="V">V-</option>
                        <option value="E">E-</option>
                      </select>
                      <input autocomplete="off" class="form-control" type="number" name="ci" placeholder="12345678" id="ci" value="{{ old('ci') ?? '' }}" required>
                      @error('ci')
                        <p class="text-danger">{{ ucfirst($message) }}</p>
                      @enderror
                      @error('ci_type')
                        <p class="text-danger">{{ ucfirst($message) }}</p>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <x-field type="date" name="birth" id="birth" value="{{ old('birth') ?? '' }}" required>
                      Fecha de nacimiento:
                    </x-field>
                  </div>
                  <div class="col-md-4">
                    <x-select name="gender" id="gender" :options="genders()->pairs()" :selected="old('gender') ?? null" required>
                      Sexo:
                    </x-select>
                  </div>
                  <div class="col-md-4">
                    <x-field type="number" name="phone" id="phone" placeholder="04128970019" value="{{ old('phone') ?? '' }}" required>
                      Número de Teléfono: 
                    </x-field>
                  </div>
                  <div class="col-md-4">
                    <x-select name="grade" id="grade" :options="grades()->pairs()" :selected="old('grade') ?? null" required>
                      Grado de Instrucción:
                    </x-select>
                  </div>
                  <div class="col-12">
                    <x-textarea name="address" id="address" placeholder="Ej. Calle 5 de marzo N°40-11, Santa Cruz, Aragua." :content="old('address') ?? ''" required>
                      Dirección
                    </x-textarea>
                  </div>
                </div>
              </div>
              <div class="d-flex justify-content-between">
                <x-button :url="route('login')" color="secondary" icon="times">
                  Volver
                </x-button>
                <x-button type="submit" color="success" icon="check">
                  Aceptar
                </x-button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</x-layout.app-alt>