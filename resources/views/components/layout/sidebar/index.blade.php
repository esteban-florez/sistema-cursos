@php
  $user = auth()->user();
@endphp

<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <div class="sidebar mt-0 h-100">
    <div class="user-panel my-3 pb-3 d-flex align-items-center">
      <div class="image pl-2">
      <img src="{{ asset($user->image) }}" class="img-circle elevation-2" alt="Imagen del usuario">
      </div>
      <div class="info">
        <p class="d-block text-white m-0">{{ $user->full_name }}</p>
        <span class="text-bold text-muted">{{ $user->role }}</span>
      </div>
    </div>
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu">
        <x-layout.sidebar.item :url="route('home')" icon="home">
          Inicio
        </x-layout.sidebar.item>
        <x-layout.sidebar.item icon="graduation-cap">
          Cursos
          <x-slot name="menu">
            @is('Estudiante')
            <x-layout.sidebar.item :url="route('available-courses.index')" icon="list">
              Lista de cursos
            </x-layout.sidebar.item>
            @endis
            @can('viewAny', App\Models\Course::class)
              <x-layout.sidebar.item :url="route('courses.index')" icon="list">
                Lista de cursos
              </x-layout.sidebar.item>
            @endcan
            @can('create', App\Models\Course::class)
              <x-layout.sidebar.item :url="route('courses.create')" icon="plus">
                Registrar curso
              </x-layout.sidebar.item>
            @endcan
            @is('Estudiante')
            <x-layout.sidebar.item :url="route('users.enrollments.index', $user)" icon="star">
              Mis cursos
            </x-layout.sidebar.item>
            @endis
            @is('Instructor')
            <x-layout.sidebar.item :url="route('users.courses.index', $user)" icon="school">
              Cursos dictados
            </x-layout.sidebar.item>
            @endis
            @can('viewAny', App\Models\Area::class)
              <x-layout.sidebar.item :url="route('areas.index')" icon="chalkboard-teacher">
                Áreas de formación
              </x-layout.sidebar.item>
            @endcan
          </x-slot>
        </x-layout.sidebar.item>
        <x-layout.sidebar.item icon="basketball-ball">
          Clubes
          <x-slot name="menu">
            @is('Estudiante')
            <x-layout.sidebar.item :url="route('available-clubs.index')" icon="list">
              Lista de clubes
            </x-layout.sidebar.item>
            <x-layout.sidebar.item :url="route('users.memberships.index', $user)" icon="star">
              Mis clubes
            </x-layout.sidebar.item>
            @endis
            @can('viewAny', App\Models\Club::class)
            <x-layout.sidebar.item :url="route('clubs.index')" icon="list">
              Lista de clubes
            </x-layout.sidebar.item>
            @endcan
            @is('Instructor')
            <x-layout.sidebar.item :url="route('users.clubs.index', $user)" icon="star">
              Clubes dictados
            </x-layout.sidebar.item>
            @endisnt
            @can('create', App\Models\Club::class)
            <x-layout.sidebar.item :url="route('clubs.create')" icon="plus">
              Registrar club
            </x-layout.sidebar.item>
            @endcan
          </x-slot>
        </x-layout.sidebar.item>
        @is('Administrador')
        <x-layout.sidebar.item icon="boxes">
          Inventario
          <x-slot name="menu">
            <x-layout.sidebar.item :url="route('items.stock.index')" icon="list-alt">
              Inventario actual
            </x-layout.sidebar.item>
            <x-layout.sidebar.item :url="route('operations.index')" icon="history">
              Historial
            </x-layout.sidebar.item>
            @can('viewAny', App\Models\Item::class)
              <x-layout.sidebar.item :url="route('items.index')" icon="th">
                Artículos
              </x-layout.sidebar.item>
            @endcan
            @can('viewAny', App\Models\Loan::class)
              <x-layout.sidebar.item :url="route('loans.index')" icon="hand-holding">
                Préstamos
              </x-layout.sidebar.item>
            @endcan
          </x-slot>
        </x-layout.sidebar.item>
        @endis
        @isnt('Instructor')
        <x-layout.sidebar.item icon="money-bill">
          Pagos
          <x-slot name="menu">
            @is('Estudiante')
            <x-layout.sidebar.item :url="route('users.payments.index', $user)" icon="list">
              Mis pagos
            </x-layout.sidebar.item>
            <x-layout.sidebar.item :url="route('unfulfilled-payments.index', ['user' => $user])" icon="receipt">
              Cuotas restantes
            </x-layout.sidebar.item>
            @endis
            @is('Administrador')
            <x-layout.sidebar.item :url="route('payments.index')" icon="list">
              Lista de pagos
            </x-layout.sidebar.item>
            <x-layout.sidebar.item :url="route('pending-payments.index')" icon="check">
              Pagos pendientes
            </x-layout.sidebar.item>
            @endis
          </x-slot>
        </x-layout.sidebar.item>
        @endisnt
        @isnt('Administrador')
        <x-layout.sidebar.item :url="route('schedule')" icon="calendar-alt">
          Horario
        </x-layout.sidebar.item>
        @endisnt
        @is('Administrador')
        <x-layout.sidebar.item url="#" icon="chart-pie">
          Estadísticas
        </x-layout.sidebar.item>
        @endis
        <div class="divider"></div>
        @isnt('Administrador')
        <x-layout.sidebar.item :url="route('users.show', $user)" icon="user-alt">
          Perfil
        </x-layout.sidebar.item>
        @endisnt
        @is('Administrador')
        <x-layout.sidebar.item icon="cog">
          Configuración
          <x-slot name="menu">
            <x-layout.sidebar.item :url="route('users.index')" icon="user-alt">
              Usuarios
            </x-layout.sidebar.item>
            <x-layout.sidebar.item :url="route('pnfs.index')" icon="university">
              PNFs
            </x-layout.sidebar.item>
            <x-layout.sidebar.item :url="route('credentials.index')" icon="file-invoice">
              Credenciales de pago
            </x-layout.sidebar.item>
            <x-layout.sidebar.item url="#" icon="database">
              Base de datos
            </x-layout.sidebar.item>
          </x-slot>
        </x-layout.sidebar.item>
        @endis
        <x-layout.sidebar.item :url="route('logout')" icon="sign-out-alt">
          Cerrar Sesión
        </x-layout.sidebar.item>
      </ul>
    </nav>
  </div>
</aside>