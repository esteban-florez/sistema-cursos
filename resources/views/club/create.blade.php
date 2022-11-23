<x-layout.main title="Registrar Club">
    <section class="container-fluid">
        <div class="card mx-sm-3">
            <div class="card-body">
                <form action="{{ route('club.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row d-flex align-items-center">
                        <x-image-input/>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <x-field name= "name" id="name" placeholder="Nombre del Curso" autocomplete="off" required>
                            Nombre:
                        </x-field>
                        <x-field name= "description" id="description" placeholder="Nombre de descripcion" autocomplete="off" required>
                            Descripcion:
                        </x-field>
                        <div class="mb-3">
                            <label class= "form-label" for="day">
                                <i class="fas fa-asterik text-danger mr-1"></i>Dias:
                            </label>
                            <select class="form-control" name="day" id="day" required>
                                <option value="mo">Lunes</option>
                                <option value="tu">Martes</option>
                                <option value="we">Miercoles</option>
                                <option value="th">Jueves</option>
                                <option value="fr">Viernes</option>
                                <option value="sa">Sabado</option>
                                <option value="su">Domingo</option>
                            </select>
                        <div class="col-sm-6">
                            <x-field type="time" name="start_hour" id="startTime" required>
                                Hora de Inicio:
                            </x-field>
                        </div>
                        <div class="col-sm-6">
                            <x-field type="time" name="end_hour" id="endTime" required>
                                Hora de Cierre:
                            </x-field>
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