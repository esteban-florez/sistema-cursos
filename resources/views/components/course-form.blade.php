@props(['action', 'areas', 'instructors', 'pnfs', 'edit' => false, 'course' => null])

<x-select2/>
<p class="m-0 font-italic">
  <b>Nota:</b> Los campos con <i class="fas fa-asterisk text-danger mx-1"></i> son obligatorios.
</p>
<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
  @if ($edit)
    @method('PUT')
  @endif
  @csrf
  <div class="row d-flex align-items-center">
    <div class="col-sm-6 col-md-4 mb-3">
      <x-image-input :image="$course->image ?? null" :required="!$edit"/>
    </div>
    <div class="col-sm-6 col-md-8">
      <x-field type="text" name="name" id="name" placeholder="Ej. Desarrollo Web" autocomplete="off" :value="old('name') ?? $course->name ?? ''" minlength="5" maxlength="50" required>
        Nombre:
      </x-field>
      <x-select name="user_id" id="userId" :options="$instructors" :selected="old('user_id') ?? $course->user_id ?? null" required>
        Instructor:
        @can('create', App\Models\User::class)
          <x-slot name="extra">
            <a class="mt-1 ml-1" href="{{ route('users.create', ['role' => 'Instructor']) }}">
              Registrar nuevo instructor
            </a>    
          </x-slot>
        @endcan
      </x-select>
      <x-select name="area_id" id="areaId" :options="$areas" :selected="old('area_id') ?? $course->area_id ?? null" required>
        Área de formación:
        @can('create', App\Models\Area::class)
          <x-slot name="extra">
            <a class="mt-1 ml-1" href="#" data-toggle="modal" data-target="#createAreaModal">Crear nueva área de formación</a>
          </x-slot>
        @endcan
      </x-select>
    </div>
    <div class="col-12 col-sm-6">
      <x-input-group type="number" name="total_price" id="totalPrice" placeholder="Ej. 900" value="{{ old('total_price') ?? $course->total_price ?? '' }}" max="2500" maxlength="7" step="0.01" validNumber required>
        Monto total:
        <x-slot name="append">
          <span class="input-group-text">Bs.D.</span>
        </x-slot>
      </x-input-group>
    </div>
    <div class="col-12 col-sm-6">
      <x-input-group type="number" name="reserv_price" id="reservPrice" placeholder="Ej. 100" value="{{ old('reserv_price') ?? $course->reserv_price ?? '' }}" max="625" maxlength="6" step="0.01" validNumber>
        Monto de reservación:
        <x-slot name="append">
          <span class="input-group-text">Bs.D.</span>
        </x-slot>
      </x-input-group>
    </div>
    <div class="col-12">
      <x-textarea name="description" id="description" rows="4" maxlength="255" placeholder="Ej. Aprende desarrollo web desde cero con este curso." :content="old('description') ?? $course->description ?? ''" minlength="10" maxlength="255" required>
        Descripción del curso:
      </x-textarea>
    </div>
    <div class="col-sm-6">
      <x-field type="date" name="start_ins" id="startIns" value="{{ old('start_ins') ?? ($edit ? $course->start_ins->format(DV) : '') }}" required>
        Inicio de inscripciones:
      </x-field>
    </div>
    <div class="col-sm-6">
      <x-field type="date" name="end_ins" id="endIns" value="{{ old('end_ins') ?? ($edit ? $course->end_ins->format(DV) : '') }}" required>
        Fin de inscripciones:
      </x-field>
    </div>
    <div class="col-sm-6">
      <x-field type="date" name="start_course" value="{{ old('start_course') ?? ($edit ? $course->start_course->format(DV) : '') }}" id="startCourse" required>
        Inicio del curso:
      </x-field>
    </div>
    <div class="col-sm-6">
      <x-field type="date" name="end_course" value="{{ old('end_course') ?? ($edit ? $course->end_course->format(DV) : '') }}" id="endCourse" required>
        Fin del curso:
      </x-field>
    </div>
    <div class="col-sm-6">
      <x-input-group type="number" name="duration" id="duration" placeholder="Ej. 5" value="{{ old('duration') ?? $course->duration ?? '' }}" max="120" maxlength="3" validNumber required>
        Duración del curso:
        <x-slot name="append">
          <span class="input-group-text">horas</span>
        </x-slot>
      </x-input-group>
    </div>
    <div class="col-sm-6">
      <x-field type="number" name="student_limit" id="studentLimit" placeholder="Ej. 15" value="{{ old('student_limit') ?? $course->student_limit ?? '' }}" max="60" maxlength="2" validNumber required>
        Máx. de estudiantes:
      </x-field>
    </div>
    <div class="col-sm-4">
      <x-select name="days[]" id="days" :options="days()->pairs()" :selected="old('days') ?? $course->days_arr ?? null" multiple required>
        Días de clases:
      </x-select>
    </div>
    <div class="col-sm-4">
      <x-field type="time" name="start_hour" id="startTime" value="{{ old('start_hour') ?? ($edit ? $course->start_hour->format(TV) : '') }}" required>
        Hora de inicio:
      </x-field>
    </div>
    <div class="col-sm-4">
      <x-field type="time" name="end_hour" id="endTime" value="{{ old('end_hour') ?? ($edit ? $course->end_hour->format(TV) : '') }}" required>
        Hora de cierre:
      </x-field>
    </div>
  </div>
  <div class="d-flex justify-content-between align-items-center">
    @can('viewAny', App\Models\Course::class)
      <x-button url="{{ route('courses.index') }}" color="danger" icon="times">
        Cancelar
      </x-button>
    @endcan
    <x-button type="submit" color="success" icon="check">
      Aceptar
    </x-button>
  </div>
</form>
@can('create', App\Models\Area::class)
  <x-area.create-modal :pnfs="$pnfs" ajax/>
@endcan