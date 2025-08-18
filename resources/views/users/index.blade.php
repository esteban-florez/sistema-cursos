<x-layout.main title="Usuarios">
  <x-select2/>
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('users.index') }}
  </x-slot>
  <x-layout.bar>
    <x-search 
      placeholder="Buscar usuario..." :value="$search"
      name="search" :filters="$filters" :sort="$sort"/>
    <div>
      @can('create', App\Models\User::class)
        <x-button icon="plus" color="success" hide-text="sm" :url="route('users.create')">Añadir</x-button>
      @endcan
      <x-button icon="filter" hide-text="sm" data-target="#filtersCollapse" data-toggle="collapse">Filtros</x-button>
    </div>
    <x-slot name="filtersCollapse">
      <x-filters-collapse>
        <x-slot name="filters">
          <x-select :options="roles()->pairs()" id="role" name="filters|role" :selected="$filters['role'] ?? null">
            Rol:
          </x-select>
        </x-slot>
        <x-slot name="sorts">
          <x-radio :options="['date' => 'Fecha', 'first_name' => 'Nombre', 'ci' => 'Cédula']" name="sort" :checked="$sort" notitle first-empty/>
        </x-slot>
      </x-filters-collapse>
    </x-slot>
  </x-layout.bar>
  <section class="container-fluid">
    <x-alert />
    @if ($users->isNotEmpty())
      <x-table>
        <x-slot name="header">
          <th>Nombre</th>
          <th>Cédula</th>
          <th>Teléfono</th>
          <th>Correo</th>
          <th>Rol</th>
          <th>Acciones</th>
        </x-slot>
        <x-slot name="body">
          @foreach ($users as $user)
            <x-row :data="[
              $user->full_name,
              $user->full_ci,
              $user->tel,
              $user->email,
              $user->role,
              ]"
            >
              <x-slot name="actions">
                @can('view', $user)
                  <x-button :url="route('users.show', $user)" class="btn-sm" icon="eye">
                    Detalles
                  </x-button>
                @endcan
              </x-slot>
            </x-row>
          @endforeach
        </x-slot>
        <x-slot name="pagination">
          <div class="pagination-container">
            {{ $users->links() }}
          </div>
        </x-slot>
      </x-table>
    @else
      <div class="empty-container">
        <h2 class="empty">No hay usuarios registrados</h2>
      </div>
    @endif
  </section>
</x-layout.main>
