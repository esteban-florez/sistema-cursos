<x-layout.main title="Registrar Club">
  <section class="container-fluid">
    <div class="card mx-sm-3">
      <div class="card-body">
        <form action="{{ route('club.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row d-flex align-items-center">
            <div class="col-sm-6 col-md-4 mb-3">
              <x-image-input :image="$club->image ?? null" required/>
            </div>
            <div class="col-sm-6 col-md-8">
              <x-field name="name" id="name" placeholder="Nombre del Curso" autocomplete="off" required>
                Nombre:
              </x-field>
              <x-select name="instructor_id" id="instructorId" :options="$instructors" required>
                Instructor:
              </x-select>
              <x-select name="day" id="day" :options="['mo' => 'Lunes', 'tu' => 'Martes', 'we' => 'Miércoles', 'Th' => 'Jueves', 'fr' => 'Viernes', 'sa' => 'Sábado', 'su' => 'Domingo']" :selected="old('day') ?? $club->day ?? ''" required>
                Días:
              </x-select>
            </div>
            <div class="col-sm-6">
              <x-field type="time" name="start_hour" id="startHour" required>
                Hora de Inicio:
              </x-field>
            </div>
            <div class="col-sm-6">
              <x-field type="time" name="end_hour" id="endHour" required>
                Hora de Cierre:
              </x-field>
            </div>
            <div class="col-12">
              <x-textarea name="description" id="description" placeholder="Nombre de descripcion" autocomplete="off" required>
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
      </div>
    </div>
  </section>
</x-layout.main>