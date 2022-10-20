<link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
<script defer src="{{ asset('js/jquery.min.js') }}"></script>
<script defer src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script defer src="{{ asset('js/adminlte.min.js') }}"></script>
<body style="background-color: black;">
  <div class="card" style="margin: 10% auto 0; width: 300px; height: 300px;">
    {{-- <x-radio name="name" :options="collect([
      'student' => 'Estudiante',
      'admin' => 'Administrador',
      'instructor' => 'Instructor'
      ])">
      Rol:
    </x-radio> --}}

    <x-select :options="collect([
      'First' => 'first',
      'Second' => 'Second',
    ])">Rol:</x-select>
  </div>
</body>