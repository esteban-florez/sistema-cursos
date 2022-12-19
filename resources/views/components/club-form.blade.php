@props(['action', 'instructors', 'edit' => false, 'club' => null])

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
      <x-field name="name" id="name" placeholder="Nombre del Club" autocomplete="off" value="{{ old('name') ?? $club->name ?? '' }}" required>
        Nombre:
      </x-field>
      <x-select name="instructor_id" id="instructorId" :options="$instructors" :selected="old('instructor_id') ?? $club->instructor_id ?? null" required>
        Instructor:
      </x-select>
      <x-select name="day" id="day" :options="days()->pairs()" :selected="old('day') ?? $club->day ?? null" default required>
        Día:
      </x-select>
    </div>
    <div class="col-sm-6">
      <x-field type="time" name="start_hour" id="startHour" value="{{ old('start_hour') ?? $club?->start_hour->format(TV) ?? '' }}" required>
        Hora de Inicio:
      </x-field>
    </div>
    <div class="col-sm-6">
      <x-field type="time" name="end_hour" id="endHour" value="{{ old('end_hour') ?? $club?->end_hour->format(TV) ?? '' }}" required>
        Hora de Cierre:
      </x-field>
    </div>
    <div class="col-12">
      <x-textarea name="description" id="description" placeholder="Nombre de descripcion" autocomplete="off" :content="old('description') ?? $club->description ?? ''" required>
        Descripcion:
      </x-textarea>
    </div>
  </div>
  <div class="d-flex justify-content-between align-items-center">
    <x-button url="{{ route('club.index') }}" color="danger" icon="times">
      Cancelar
    </x-button>
    <x-button type="submit" color="success" icon="check">
      Aceptar
    </x-button>
  </div>
</form>