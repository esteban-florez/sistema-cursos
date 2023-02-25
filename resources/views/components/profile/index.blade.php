<section class="container-fluid mt-2">
  <x-alert />
  <div class="row no-gutters">
    <div class="col-lg-5 col-xl-4">
      <div class="row">
        <div class="col-md-6 col-lg-12">
          <x-profile.widget 
            :name="$user->full_name"
            :role="$user->role"
            :image="$user->image"
            :course-count="$user->enrollments->count()"
            :club-count="$user->memberships->count()"
          />
          <div class="card card-info mx-2">
            <div class="card-header">
              <h4 class="mb-0 my-lg-2">Datos de usuario: </h5>
            </div>
            <div class="card-body">
              <ul class="list-unstyled mb-0">
                <x-profile.data :data="$user->email">
                  Correo Electrónico:
                </x-profile.data>
                @if (Auth::user()->id === $user->id)
                  <x-button class="my-2" url="{{ route('password.change', $user->id) }}">
                    Cambiar contraseña
                  </x-button>
                @endif
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-12">
          <div class="card card-info mx-2">
            <div class="card-header">
              <div class="d-flex align-items-center justify-content-between">
                <h4 class="my-2">Datos personales: </h4>
                @if (Auth::user()->id === $user->id)
                  <x-button url="{{ route('users.edit', $user->id) }}" color="info">
                    <i class="fas fa-edit"></i>
                  </x-button>
                @endif
              </div>
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
                <x-profile.data :data="$user->birth->format(DF)">
                  Fecha de Nacimiento:
                </x-profile.data>
                <x-profile.data :data="$user->tel">
                  Número de Teléfono:
                </x-profile.data>
                @is('Estudiante', $user)
                <x-profile.data :data="$user->grade">
                  Grado de Instrucción:
                </x-profile.data>
                @endis
                @is('Instructor', $user)
                <x-profile.data :data="$user->degree">
                  Titulación:
                </x-profile.data>
                @endis
                <x-profile.data :data="$user->address">
                  Dirección:
                </x-profile.data>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-7 col-xl-8">
      <div class="card mx-2 card-dark">
        <div class="card-header">
          <div class="d-flex align-items-center justify-content-between">
            <h3 class="my-2">Mis cursos</h3>
            @if (Auth::user()->id === $user->id)
            <a href="{{ route('users.enrollments.index', $user->id) }}" class="mt-1">
              <span>Ver todos</span>
              <i class="fas fa-arrow-right"></i>
            </a>
            @endis
          </div>
        </div>
        <div class="card-body">
          @forelse($enrollments as $enrollment)
            <x-profile.course :enrollment="$enrollment"/>
          @empty
            <div class="empty-container">
              <div class="empty">No tienes cursos actualmente.</div>
            </div>
          @endforelse
        </div>
      </div>
      <div class="card mx-2 card-dark">
        <div class="card-header">
          <div class="d-flex align-items-center justify-content-between">
            <h3 class="my-2">Mis clubes</h3>
            @if (Auth::user()->id === $user->id)
              <a href="{{ route('users.memberships.index', $user->id) }}" class="mt-1">
                <span>Ver todos</span>
                <i class="fas fa-arrow-right"></i>
              </a>
            @endis
          </div>
        </div>
        <div class="card-body">
          @forelse($memberships as $membership)
            <x-profile.club :membership="$membership"/>
          @empty
            <div class="empty-container">
              <div class="empty">No tienes clubes actualmente.</div>
            </div>
          @endforelse
        </div>
      </div>
    </div>
  </div>
</section>