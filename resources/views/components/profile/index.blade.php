<section class="container-fluid mt-2">
  <div class="row no-gutters">
    <div class="col-md-5 col-xl-4">
      <x-profile.widget 
        :name="$user->full_name"
        :role="$user->role"
        :image="$user->image"
        :course-count="$user->inscriptions->count()"
        :club-count="0"
      />
      <div class="card card-info mx-2">
        <div class="card-header">
          <h4 class="my-2">Datos de usuario: </h5>
        </div>
        <div class="card-body">
          <ul class="list-unstyled">
            <x-profile.data :data="$user->email">
              Correo Electrónico:
            </x-profile.data>
            {{-- TODO -> aqui va un boton de cambiar contraseña en caso de que el que vea el perfil sea el usuario autenticado --}}
          </ul>
        </div>
      </div>
      <div class="card card-info mx-2">
        <div class="card-header">
          <h4 class="my-2">Datos personales: </h4>
        </div>
        <div class="card-body">
          <ul class="list-unstyled">
            <x-profile.data :data="$user->names">
              Nombre:
            </x-profile.data>
            <x-profile.data :data="$user->lastnames">
              Apellido:
            </x-profile.data>
            <x-profile.data :data="$user->gender">
              Sexo:
            </x-profile.data>
            <x-profile.data :data="$user->full_ci">
              Cedula de Identidad:
            </x-profile.data>
            <x-profile.data :data="$user->birth">
              Fecha de Nacimiento:
              {{-- TODO -> mostrar fecha bonita en español --}}
            </x-profile.data>
            <x-profile.data :data="$user->tel">
              Número de Teléfono:
            </x-profile.data>
            @if ($user->role === 'Estudiante')
            <x-profile.data :data="$user->grade">
              Grado de Instrucción:
            </x-profile.data>
            @else
            <x-profile.data :data="$user->degree">
              Titulación:
            </x-profile.data>
            @endif
            <x-profile.data :data="$user->address">
              Dirección:
            </x-profile.data>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-7 col-xl-8">
      <div class="card mx-2 card-dark">
        <div class="card-header">
          <h3 class="my-2">Mis cursos</h3>
        </div>
        <div class="card-body">
          <div class="row no-gutters">
            <x-profile.course/>
            <x-profile.course/>
          </div>
        </div>
      </div>
      <div class="card mx-2 card-dark">
        <div class="card-header">
          <h3 class="my-2">Mis clubes</h3>
        </div>
        <div class="card-body">
          <div class="row no-gutters">
            <x-profile.club/>
            <x-profile.club/>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>