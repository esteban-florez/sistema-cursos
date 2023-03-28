<section class="container-fluid mt-2">
  <x-alert />
  <x-errors />
  <div class="row no-gutters">
    <div class="col-lg-5 col-xl-4">
      <div class="row">
        <div class="col-md-6 col-lg-12">
          <x-profile.widget 
            :user="$user"
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
                  <x-button class="my-2" url="{{ route('password.change') }}">
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
                @can('update', $user)
                  <x-button url="{{ route('users.edit', $user) }}" color="info">
                    <i class="fas fa-edit"></i>
                  </x-button>
                @endcan
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
                @if($user->can('role', 'Estudiante'))
                <x-profile.data :data="$user->grade">
                  Grado de Instrucción:
                </x-profile.data>
                @endif
                @if($user->can('role', 'Instructor'))
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
      </div>
    </div>
    <div class="col-lg-7 col-xl-8">
      <div class="card mx-2 card-dark">
        <div class="card-header">
          <div class="d-flex align-items-center justify-content-between">
            @if($user->role === 'Estudiante')
              <h3 class="my-2">Mis cursos</h3>
              @can('users.enrollments.viewAny', $user)
                <a href="{{ route('users.enrollments.index', $user) }}" class="mt-1">
                  <span>Ver todos</span>
                  <i class="fas fa-arrow-right"></i>
                </a>
              @endcan
            @endif
            @if($user->role === 'Instructor')
              <h3 class="my-2">Cursos dictados</h3>
              @can('users.courses.viewAny', $user)
                <a href="{{ route('users.courses.index', $user) }}" class="mt-1">
                  <span>Ver todos</span>
                  <i class="fas fa-arrow-right"></i>
                </a>
              @endcan
            @endif
          </div>
        </div>
        <div class="card-body">
          @if($user->role === 'Estudiante')
            @forelse($enrollments as $enrollment)
              <x-profile.enrollment :enrollment="$enrollment"/>
            @empty
              <div class="empty-container">
                <div class="empty">No tienes cursos actualmente.</div>
              </div>
            @endforelse
          @endif
          @if($user->role === 'Instructor')
            @forelse($courses as $course)
              <x-profile.course :course="$course"/>
            @empty
              <div class="empty-container">
                <div class="empty">No tienes cursos actualmente.</div>
              </div>
            @endforelse
          @endif
        </div>
      </div>
      <div class="card mx-2 card-dark">
        <div class="card-header">
          <div class="d-flex align-items-center justify-content-between">
            @if($user->role === 'Estudiante')
              <h3 class="my-2">Mis clubes</h3>
              @can('users.memberships.viewAny', $user)
                <a href="{{ route('users.memberships.index', $user) }}" class="mt-1">
                  <span>Ver todos</span>
                  <i class="fas fa-arrow-right"></i>
                </a>
              @endcan
            @endif
            @if($user->role === 'Instructor')
              <h3 class="my-2">Clubes dictados</h3>
              @can('users.clubs.viewAny', $user)
                <a href="{{ route('users.clubs.index', $user) }}" class="mt-1">
                  <span>Ver todos</span>
                  <i class="fas fa-arrow-right"></i>
                </a>
              @endcan
            @endif
          </div>
        </div>
        <div class="card-body">
          @if($user->role === 'Estudiante')
            @forelse($memberships as $membership)
              <x-profile.membership :membership="$membership"/>
            @empty
              <div class="empty-container">
                <div class="empty">No tienes clubes actualmente.</div>
              </div>
            @endforelse
          @endif
          @if($user->role === 'Instructor')
            @forelse($clubs as $club)
              <x-profile.club :club="$club"/>
            @empty
              <div class="empty-container">
                <div class="empty">No tienes clubes actualmente.</div>
              </div>
            @endforelse
          @endif
        </div>
      </div>
    </div>
  </div>
</section>
<x-profile.modal :user="$user"/>