@props(['action', 'instructors', 'edit' => false, 'club' => null])

<x-select2/>
<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
  @if ($edit)
    @method('PUT')
  @endif
  @csrf
  <div class="row d-flex align-items-center">
    <div class="col-sm-6 col-md-4 mb-3">
      <x-image-input :image="$club->image ?? null" :required="!$edit"/>
    </div>
    <div class="col-sm-6 col-md-8">
      <x-field name="name" id="name" placeholder="Ej. Futbol" autocomplete="off" value="{{ old('name') ?? $club->name ?? '' }}" minlength="5" maxlength="30" required>
        Nombre:
      </x-field>
      <x-select name="day" id="day" :options="days()->pairs()" :selected="old('day') ?? $club->day ?? null" default required>
        Día:
      </x-select>
      <x-select name="user_id" id="userId" :options="$instructors" :selected="old('user_id') ?? $club->user_id ?? null" required>
        Instructor:
        @can('create', App\Models\User::class)
          <x-slot name="extra">
            <a class="mt-1 ml-1" href="{{ route('users.create', ['role' => 'Instructor']) }}">
              Registrar nuevo instructor
            </a>    
          </x-slot>
        @endcan
      </x-select>
    </div>
    <div class="col-sm-6">
      <x-field type="time" name="start_hour" id="startHour" value="{{ old('start_hour') ?? ($edit ? $club->start_hour->format(TV) : '') }}" required>
        Hora de Inicio:
      </x-field>
    </div>
    <div class="col-sm-6">
      <x-field type="time" name="end_hour" id="endHour" value="{{ old('end_hour') ?? ($edit ? $club->end_hour->format(TV) : '') }}" required>
        Hora de Cierre:
      </x-field>
    </div>
    <div class="col-12">
      <x-textarea name="description" id="description" placeholder="Ej. Aprende las bases del futbol y desarrolla tus habilidades en esta área." autocomplete="off" :content="old('description') ?? $club->description ?? ''" minlength="10" maxlength="255" required>
        Descripcion:
      </x-textarea>
    </div>
  </div>
  <div class="d-flex justify-content-between align-items-center">
    @can('viewAny', App\Models\Club::class)
      <x-button url="{{ route('clubs.index') }}" color="danger" icon="times">
        Cancelar
      </x-button>
    @endcan
    <x-button type="submit" color="success" icon="check">
      Aceptar
    </x-button>
  </div>
</form>