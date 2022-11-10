<x-layout.main title="Registrar Curso">
  @push('css')
    <link rel="stylesheet" href="{{ asset('css/imagen-input.css') }}">
  @endpush
  @push('js')
    <script defer src="{{ asset('js/imgPreview.js') }}"></script>
  @endpush
  <section class="container-fluid">
    <div class="card mx-sm-3">
      <div class="card-body">
        <form action="{{ route('courses.store') }}" method="POST">
          @csrf
          <div class="row d-flex align-items-center">
            <div class="col-sm-6 col-md-4">
              <div class="image-input-container" id="previewWrapper">
                <span class="badge badge-3 badge-dark position-absolute user-select-none">Click para añadir imagen</span>
                <img class="img-cover" src="{{ asset('img/placeholder.jpg') }}" alt="Portada del Curso" id="previewImg"> 
                <input type="file" name="image" id="imgInput">
              </div>
            </div>
            <div class="col-sm-6 col-md-8">
              <x-field name="name" id="name" placeholder="Nombre del Curso" autocomplete="off" required>
                Nombre:
              </x-field>
              <div class="mb-3">
                <label class="form-label" for="instructor-id"><i class="fas fa-asterisk text-danger mr-1"></i>Instructores:</label>
                <select class="form-control" name="instructor-id" id="instructorId" required>
                  @foreach ($instructors as $instructor)
                  <option value="{{ $instructor->id }}">
                    {{ $instructor->role }} {{ $instructor->name }} {{ $instructor->lastname }}
                  </option>
                  @endforeach
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label" for="areas-id"><i class="fas fa-asterisk text-danger mr-1"></i>Areas:</label>
                <select class="form-control" name="areas-id" id="areasId" required>
                  @foreach ($areas as $area)
                  <option value="{{ $area->id }}">
                    {{ $area->name }}
                  </option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-12 col-sm-6 mb-3">
              <label class="form-label" for="total-price"><i class="fas fa-asterisk text-danger mr-1"></i>Precio Total:</label>
              <div class="input-group flex-nowrap">
                <input class="form-control" type="number" id="totalPrice" name="total-price" required/>
                <div class="input-group-append">
                  <span class="input-group-text" id="basic-addon1">$</span>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 mb-3">
              <label class="form-label" for="price-ins"><i class="fas fa-asterisk text-danger mr-1"></i>Precio de Inscripción:</label>
              <div class="input-group flex-nowrap">
                <input class="form-control w-50" type="number" id="priceIns" name="price-ins"/>
                <div class="input-group-append">
                  <span class="input-group-text" id="basic-addon1">$</span>
                </div>
              </div>
            </div>
            <div class="col-12">
              <x-textarea name="description" id="description" rows="2" maxlength="2000" required>
                Descripción del curso:
              </x-textarea>
            </div>
            <div class="col-sm-6">
              <x-field type="date" name="start-date" id="startDate" required>
                Incio de Inscripciones:
              </x-field>
            </div>
            <div class="col-sm-6">
              <x-field type="date" name="end-date" id="endDate" required>
                Fin de Inscripciones:
              </x-field>
            </div>
            <div class="col-sm-6">
              <x-field type="date" name="start-course" id="startCourse" required>
                Incio de Curso:
              </x-field>
            </div>
            <div class="col-sm-6">
              <x-field type="date" name="end-course" id="endCourse" required>
                Fin de Curso:
              </x-field>
            </div>
            <div class="col-sm-6 mb-3">
              <label class="form-label" for="duration">Duración del curso:</label>
              <div class="input-group">
                <input class="form-control" type="number" name="duration" id="duration" required/>
                <div class="input-group-append">
                  <span class="input-group-text">horas</span>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <x-field type="number" name="student-limit" id="studentLimit" required>
                Máx. de Estudiantes:
              </x-field>
            </div>
            <div class="col-sm-6">
              <x-field type="time" name="start-time" id="startTime" required>
                Hora de Inicio:
              </x-field>
            </div>
            <div class="col-sm-6">
              <x-field type="time" name="end-time" id="endTime" required>
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
        </div>
      </div>
    </div>
  </section>
</x-layout.main>