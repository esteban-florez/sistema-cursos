<x-layout.main title="Matrícula">
  @push('css')
    <link rel="stylesheet" href="{{ asset('css/listados.css') }}">
  @endpush
  <x-layout.bar>
    <x-search placeholder="Buscar estudiantes..."/>
    <x-button icon="file" hide-text="md" url="#">
      Generar PDF
    </x-button>
  </x-layout.bar>
  {{-- Inscripciones --}}
  <section class="content">
    <div class="container-fluid">
      <div class="card py-2 px-3 mb-0 list-top">
        <x-inscribed.header :course="$course" :students="$students"/>
      </div>
      <div class="card list-bottom">
        @if($course->status === 'Pre-inscripciones')
          <div class="alert alert-info mx-3 mt-3 d-flex align-items-center gap-2">
            <i class="fas fa-info-circle"></i>
            <p class="h5 m-0">Este curso aún no posee estudiantes matriculados.</p>
          </div>
        @else
          <x-inscribed.table :course="$course" :students="$students"/>
        @endif
      </div>
    </div>
  </section>
  {{-- Activo --}}
  {{-- <section class="content">
    <div class="container-fluid">
      <div class="card py-2 px-3 mb-0 list-top">
        <div class="title-wrapper">
          <h2 class="h3 mb-0 mr-3 text-break">Curso de Programación Web</h2>
          <p class="m-0 h5">17/30 estudiantes</p>
        </div>
        <div class="d-flex align-items-center gap-3">
          <span class="badge badge-primary badge-4">Activo</span>
          <button type="button" class="btn btn-success">
            <i class="fas fa-plus"></i>
            <span>Añadir</span>
          </button>
        </div>
      </div>
      <div class="card list-bottom">
        <div class="card-body table-responsive p-0">
          <table class="table table-bordered text-center mb-0">
            <thead class="thead-dark">
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Cédula</th>
                <th>Teléfono</th>
                <th>¿UPTA?</th>
                <th>¿Solvente?</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>#1</td>
                <td>Luis González</td>
                <td>12.345.678</td>
                <td>0415-1234567</td>
                <td>Sí</td>
                <td>Sí</td>
                <td>
                  <a class="btn btn-primary btn-sm" href="/perfil.html">Perfil</a>
                  <a class="btn btn-danger btn-sm" href="#">Retirar</a>
                </td>
              </tr>
              <tr>
                <td>#2</td>
                <td>Carlos Sánchez</td>
                <td>23.456.789</td>
                <td>0415-2345678</td>
                <td>No</td>
                <td>Sí</td>
                <td>
                  <a class="btn btn-primary btn-sm" href="/perfil.html">Perfil</a>
                  <a class="btn btn-danger btn-sm" href="#">Retirar</a>
                </td>
              </tr>
              <tr>
                <td>#3</td>
                <td>Carlos Sánchez</td>
                <td>34.567.890</td>
                <td>0415-3456789</td>
                <td>Sí</td>
                <td>No</td>
                <td>
                  <a class="btn btn-primary btn-sm" href="/perfil.html">Perfil</a>
                  <a class="btn btn-danger btn-sm" href="#">Retirar</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="card-footer">
          <ul class="pagination pagination-sm m-0 d-flex justify-content-center">
            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
          </ul>
        </div>
      </div>
    </div>
  </section> --}}
  {{-- Finalizado --}}
  {{-- <section class="content">
    <div class="container-fluid">
      <div class="card py-2 px-3 mb-0 list-top">
        <div class="title-wrapper">
          <h2 class="h3 mb-0 mr-3 text-break">Curso de Programación Web</h2>
          <p class="m-0 h5">17/30 estudiantes</p>
        </div>
        <div class="d-flex align-items-center gap-3">
          <span class="badge badge-success badge-4">Finalizado</span>
          <button type="button" class="btn btn-danger">
            <i class="fas fa-times-circle"></i>
            <span>Cierre</span>
          </button>
        </div>
      </div>
      <div class="card list-bottom">
        <div class="card-body table-responsive p-0">
          <table class="table table-bordered text-center mb-0">
            <thead class="thead-dark">
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Cédula</th>
                <th>Teléfono</th>
                <th>¿UPTA?</th>
                <th>¿Solvente?</th>
                <th>¿Aprobado?</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>#1</td>
                <td>Luis González</td>
                <td>12.345.678</td>
                <td>0415-1234567</td>
                <td>Sí</td>
                <td>Sí</td>
                <td>
                  <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" class="custom-control-input" id="approvedSwitch1" value="false">
                    <label class="custom-control-label text-danger" for="approvedSwitch1">No</label>
                  </div>
                </td>
                <td>
                  <a class="btn btn-primary btn-sm" href="/perfil.html">Perfil</a>
                </td>
              </tr>
              <tr>
                <td>#2</td>
                <td>Carlos Sánchez</td>
                <td>23.456.789</td>
                <td>0415-2345678</td>
                <td>No</td>
                <td>Sí</td>
                <td>
                  <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" class="custom-control-input" id="approvedSwitch2" value="false">
                    <label class="custom-control-label text-danger" for="approvedSwitch2">No</label>
                  </div>
                </td>
                <td>
                  <a class="btn btn-primary btn-sm" href="/perfil.html">Perfil</a>
                </td>
              </tr>
              <tr>
                <td>#3</td>
                <td>Carlos Sánchez</td>
                <td>34.567.890</td>
                <td>0415-3456789</td>
                <td>Sí</td>
                <td>No</td>
                <td>
                  <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                    <input type="checkbox" class="custom-control-input" id="approvedSwitch3" value="false" disabled>
                    <label class="custom-control-label text-danger" for="approvedSwitch3">No</label>
                  </div>
                </td>
                <td>
                  <a class="btn btn-primary btn-sm" href="/perfil.html">Perfil</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="card-footer">
          <ul class="pagination pagination-sm m-0 d-flex justify-content-center">
            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
          </ul>
        </div>
      </div>
    </div>
  </section> --}}
</x-layout.main>