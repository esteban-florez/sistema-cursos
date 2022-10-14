<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <div class="sidebar mt-0 h-100">
  <div class="user-panel my-3 pb-3 d-flex align-items-center">
    <div class="image pl-2">
    <img src="{{ asset('img/sample1.jpg') }}" class="img-circle elevation-2" alt="Imagen del usuario">
    </div>
    <div class="info">
    <p class="d-block text-white m-0">{{ Auth::user()->name }}</p>
    <span class="text-bold text-muted">{{ Str::ucfirst(Auth::user()->role) }}</span>
    </div>
  </div>
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu">
      <x-sidebar.item icon="graduation-cap">
        Cursos
        <x-slot name="menu">
          <x-sidebar.item url="#" icon="list">
            Lista de cursos
          </x-sidebar.item>
          @is('administrator')
          <x-sidebar.item url="#" icon="plus">
            Registrar curso
          </x-sidebar.item>
          <x-sidebar.item url="#" icon="book">
            Expedientes
          </x-sidebar.item>
          @endis
          @isnt('administrator')
          <x-sidebar.item url="#" icon="star">
            Mis cursos
          </x-sidebar.item>
          @endisnt
          @isnt('student')
          <x-sidebar.item url="#" icon="chalkboard-teacher">
            Áreas de formación
          </x-sidebar.item>
          <x-sidebar.item url="#" icon="clipboard-list">
            Matrícula
          </x-sidebar.item>
          @endisnt
        </x-slot>
      </x-sidebar.item>
      <x-sidebar.item icon="basketball-ball">
        Clubes
        <x-slot name="menu">
          <x-sidebar.item url="#" icon="list">
            Lista de clubes
          </x-sidebar.item>
          @isnt('administrator')
          <x-sidebar.item url="#" icon="star">
            Mis clubes
          </x-sidebar.item>
          @endisnt
          @is('administrator')
          <x-sidebar.item url="#" icon="plus">
            Registrar club
          </x-sidebar.item>
          @endis
          @isnt('student')
          <x-sidebar.item url="#" icon="shopping-basket">
            Artículos
          </x-sidebar.item>
          <x-sidebar.item url="#" icon="users">
            Miembros
          </x-sidebar.item>
          @endisnt
        </x-slot>
      </x-sidebar.item>
      @isnt('student')
      <x-sidebar.item icon="boxes">
        Inventarios
        <x-slot name="menu">
          <x-sidebar.item url="#" icon="list-alt">
            Inventario actual
          </x-sidebar.item>
          <x-sidebar.item url="#" icon="history">
            Historial
          </x-sidebar.item>
        </x-slot>
      </x-sidebar.item>
      @endisnt
      @isnt('instructor')
      <x-sidebar.item icon="money-bill">
        Pagos
        <x-slot name="menu">
          <x-sidebar.item url="#" icon="list">
            Lista de pagos
          </x-sidebar.item>
          @is('administrator')
          <x-sidebar.item url="#" icon="check">
            Por verificar
          </x-sidebar.item>
          @endis
          @is('student')
          <x-sidebar.item url="#" icon="receipt">
            Cuotas pendientes
          </x-sidebar.item>
          @endis
        </x-slot>
      </x-sidebar.item>
      @endisnt
      @isnt('administrator')
      <x-sidebar.item url="#" icon="calendar-alt">
        Horario
      </x-sidebar.item>
      @endisnt
      @is('administrator')
      <x-sidebar.item url="#" icon="chart-pie">
        Estadísticas
      </x-sidebar.item>
      @endis
      <div class="divider"></div>
      @isnt('administrator')
      <x-sidebar.item url="#" icon="user-alt">
        Perfil
      </x-sidebar.item>
      @endisnt
      @is('administrator')
      <x-sidebar.item icon="cog">
        Configuración
        <x-slot name="menu">
          <x-sidebar.item url="#" icon="user-alt">
            Usuarios del sistema
          </x-sidebar.item>
          <x-sidebar.item url="#" icon="file-invoice">
            Credenciales de pago
          </x-sidebar.item>
          <x-sidebar.item url="#" icon="database">
            Base de datos
          </x-sidebar.item>
        </x-slot>
      </x-sidebar.item>
      @endis
      <x-sidebar.item :url="route('logout')" icon="sign-out-alt">
        Cerrar Sesión
      </x-sidebar.item>
    </ul>
  </nav>
  </div>
</aside>