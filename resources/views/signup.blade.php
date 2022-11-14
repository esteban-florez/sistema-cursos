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
          <x-user-form
            type="student"
            :action="route('students.store')"
          />
        </div>
      </div>
    </div>
  </body>
</x-layout.app-alt>