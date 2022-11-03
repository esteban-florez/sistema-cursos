<x-layout.main title="Registrar Curso">
  @push('css')
    <link rel="stylesheet" href="{{ asset('css/imagen-input.css') }}">
  @endpush
  @push('js')
    <script defer src="{{ asset('js/imgPreview.js') }}"></script>
    <script defer src="{{ asset('js/coursePlan.js') }}"></script>
  @endpush
  <section class="container-fluid">
    <div class="card mx-sm-3">
      <div class="card-body">
        <form action="#" method="POST">
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
              <x-field name="name_course" id="nameCourse" placeholder="Nombre del Curso" autocomplete="off" required>
                Nombre:
              </x-field>
              <x-select name="instructor_name" id="instructorName" required default :options="['Elias'=>'Ing. Elias Vargas', 'Ana'=>'Ing. Ana Garcia']">
                Instructor:
              </x-select>
              <x-select name="area" id="area" required default :options="['pnf_informatica'=>'PNF Informática', 'pnf_contaduria'=>'PNF Contaduría']">
                Área de Formación:
              </x-select>
            </div>
            <div class="col-12 col-sm-6 mb-3">
              <label class="form-label" for="price_total"><i class="fas fa-asterisk text-danger mr-1"></i>Precio Total:</label>
              <div class="input-group flex-nowrap">
                <input class="form-control" type="number" id="priceTotal" name="price_total" required/>
                <div class="input-group-append">
                  <span class="input-group-text" id="basic-addon1">$</span>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 mb-3">
              <label class="form-label" for="price_insc"><i class="fas fa-asterisk text-danger mr-1"></i>Precio de Inscripción:</label>
              <div class="input-group flex-nowrap">
                <input class="form-control w-50" type="number" id="priceInsc" name="price_insc"/>
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
            <div class="col-12">
              <x-field type="checkbox" name="plan_course" id="planCourse">
                Planificar Curso
              </x-field>
            </div>
            <div class="col-sm-6">
              <x-field type="date" name="start_date" id="startDate" disabled>
                Incio de Inscripciones:
              </x-field>
            </div>
            <div class="col-sm-6">
              <x-field type="date" name="end_date" id="endDate" disabled>
                Fin de Inscripciones:
              </x-field>
            </div>
            <div class="col-sm-6">
              <x-field type="date" name="start_course" id="startCourse" disabled>
                Incio de Curso:
              </x-field>
            </div>
            <div class="col-sm-6">
              <x-field type="date" name="end_course" id="endCourse" disabled>
                Fin de Curso:
              </x-field>
            </div>
            <div class="col-sm-6 mb-3">
              <label class="form-label" for="duration">Duración del curso:</label>
              <div class="input-group">
                <input class="form-control" type="number" id="duration" name="duration" disabled/>
                <div class="input-group-append">
                  <span class="input-group-text">horas</span>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <x-field type="number" name="student-limit" id="studentLimit" disabled>
                Máx. de Estudiantes:
              </x-field>
            </div>
            <div class="col-sm-6">
              <x-field type="time" name="start_time" id="startTime" disabled>
                Hora de Inicio:
              </x-field>
            </div>
            <div class="col-sm-6">
              <x-field type="time" name="end_time" id="endTime" disabled>
                Hora de Cierre:
              </x-field>
            </div>
          </div>
          <div class="d-flex justify-content-between align-items-center">
            <x-button color="danger" icon="times">
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