@props(['action', 'areas', 'instructors', 'edit' => false, 'user' => null])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
  @if ($edit)
    @method('PUT')
  @endif
  @csrf
  <div class="row d-flex align-items-center">
    <div class="col-sm-6 col-md-4 mb-3">
      <x-image-input required/>
    </div>
    <div class="col-sm-6 col-md-8">
      <x-field name="name" id="name" placeholder="Nombre del Curso" autocomplete="off" required>
        Nombre:
      </x-field>
      <x-select name="instructor_id" id="instructorId" :options="$instructors" required>
        Instructores:
      </x-select>
      <x-select name="area_id" id="areaId" :options="$areas" required>
        Área de Formación:
      </x-select>
    </div>
    <div class="col-12 col-sm-6 mb-3">
      <label class="form-label" for="totalPrice"><i class="fas fa-asterisk text-danger mr-1"></i>Precio Total:</label>
      <div class="input-group flex-nowrap">
        <input class="form-control" type="number" id="totalPrice" name="total_price" placeholder="Ej. 45" required/>
        <div class="input-group-append">
          <span class="input-group-text" id="basic-addon1">$</span>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 mb-3">
      <label class="form-label" for="priceIns"><i class="fas fa-asterisk text-danger mr-1"></i>Precio de Inscripción:</label>
      <div class="input-group flex-nowrap">
        <input class="form-control w-50" type="number" id="priceIns" name="price_ins" placeholder="Ej. 5" required/>
        <div class="input-group-append">
          <span class="input-group-text" id="basic-addon1">$</span>
        </div>
      </div>
    </div>
    <div class="col-12">
      <x-textarea name="description" id="description" rows="2" maxlength="2000" placeholder="Descripción del curso" required>
        Descripción del curso:
      </x-textarea>
    </div>
    <div class="col-sm-6">
      <x-field type="date" name="start_ins" id="startIns" required>
        Incio de Inscripciones:
      </x-field>
    </div>
    <div class="col-sm-6">
      <x-field type="date" name="end_ins" id="endIns" required>
        Fin de Inscripciones:
      </x-field>
    </div>
    <div class="col-sm-6">
      <x-field type="date" name="start_course" id="startCourse" required>
        Incio de Curso:
      </x-field>
    </div>
    <div class="col-sm-6">
      <x-field type="date" name="end_course" id="endCourse" required>
        Fin de Curso:
      </x-field>
    </div>
    <div class="col-sm-6 mb-3">
      <label class="form-label" for="duration">Duración del curso:</label>
      <div class="input-group">
        <input class="form-control" type="number" name="duration" id="duration" placeholder="Ej. 80" required/>
        <div class="input-group-append">
          <span class="input-group-text">horas</span>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <x-field type="number" name="student_limit" id="studentLimit" placeholder="Ej. 15" required>
        Máx. de Estudiantes:
      </x-field>
    </div>
    <div class="col-sm-6">
      <x-field type="time" name="start_time" id="startTime" required>
        Hora de Inicio:
      </x-field>
    </div>
    <div class="col-sm-6">
      <x-field type="time" name="end_time" id="endTime" required>
        Hora de Cierre:
      </x-field>
    </div>
  </div>
  <div class="d-flex justify-content-between align-items-center">
    <x-button url="{{ route('courses.index') }}" color="danger" icon="times">
      Cancelar
    </x-button>
    <x-button type="submit" color="success" icon="check">
      Aceptar
    </x-button>
  </div>
</form>