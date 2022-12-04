<x-layout.main title="Matrícula">
  <section class="card p-2 p-sm-3">
    <div class="content-top-layout alt-top-layout">
      <h1>Matrícula</h1>
      <div class="buttons-wrapper">
        <div class="dropdown d-inline-block">
          <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
            <i class="fas fa-file-download"></i>
            <span class="d-none d-md-inline">Planilla</span>
          </button>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="#">PDF</a>
            <a class="dropdown-item" href="#">Excel</a>
          </div>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#filtersCollapse">
          <i class="fas fa-filter"></i>
          <span class="d-none d-md-inline">Filtros</span>
        </button>
      </div>
      <form>
        <div class="input-group">
          <input class="form-control" type="text" placeholder="Buscar estudiante...">
          <div class="input-group-append">
            <button class="btn btn-dark" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>
    </div>
    <div class="collapse" id="filtersCollapse">
      <hr>
      <form class="container-fluid">
        <!-- Inscripciones -->
        <!-- <div class="row">
          <div class="col-md-6 px-5">
            <h4>Filtrar por: </h4>
            <label class="font-weight-normal" for="inscripcionSelect">Estado de inscripción:</label>
            <select class="form-control" id="inscripcionSelect" name="inscripcion">
              <option value="todos" selected>Todos</option>
              <option value="aprobado">Aprobado</option>
              <option value="espera">En espera</option>
            </select>
            <label class="font-weight-normal mt-3" for="uptaSelect">Estudiante de la UPTA:</label>
            <select class="form-control" id="uptaSelect" name="upta">
              <option value="todos" selected>Todos</option>
              <option value="aprobado">Sí</option>
              <option value="espera">No</option>
            </select>
          </div>
          <div class="col-md-6 px-5">
            <h4>Ordenar por: </h4>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="order" id="idRadio" value="id" checked>
              <label class="form-check-label" for="idRadio">ID</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="order" id="nameRadio" value="name">
              <label class="form-check-label" for="nameRadio">Nombre</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="order" id="ciRadio" value="ci">
              <label class="form-check-label" for="ciRadio">Cédula</label>
            </div>
          </div>
        </div> -->
        <!-- Activo o Finalizado -->
        <div class="row">
          <div class="col-md-6 px-5">
            <h4>Filtrar por: </h4>
            <label class="font-weight-normal" for="solvenciaSelect">Solvencia:</label>
            <select class="form-control" id="solvenciaSelect" name="solvencia">
              <option value="todos" selected>Todos</option>
              <option value="si">Aprobado</option>
              <option value="no">En espera</option>
            </select>
            <label class="font-weight-normal mt-3" for="uptaSelect">Estudiante de la UPTA:</label>
            <select class="form-control" id="uptaSelect" name="upta">
              <option value="todos" selected>Todos</option>
              <option value="si">Sí</option>
              <option value="no">No</option>
            </select>
          </div>
          <div class="col-md-6 px-5">
            <h4>Ordenar por: </h4>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="order" id="idRadio" value="id" checked>
              <label class="form-check-label" for="idRadio">ID</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="order" id="nameRadio" value="name">
              <label class="form-check-label" for="nameRadio">Nombre</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="order" id="ciRadio" value="ci">
              <label class="form-check-label" for="ciRadio">Cédula</label>
            </div>
          </div>
        </div>
      </form>
    </div>
  </section>
  <!-- Inscripciones -->
  <!-- <section class="content">
    <div class="container-fluid">
      <div class="card py-2 px-3 mb-0 list-top">
        <div class="title-wrapper">
          <h2 class="h3 mb-0 mr-3 text-break">Curso de Programación Web</h2>
          <p class="m-0 h5">17/30 estudiantes</p>
        </div>
        <div class="d-flex align-items-center gap-3">
          <span class="badge badge-info badge-4">Inscripciones</span>
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
                <th>Estado de inscripción</th>
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
                <td>Aprobado</td>
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
                <td>En espera</td>
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
                <td>Aprobado</td>
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
  </section> -->
  <!-- Activo -->
  <!-- <section class="content">
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
  </section> -->
  <!-- Finalizado -->
  <section class="content">
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
  </section>
</x-layout.main>