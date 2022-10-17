<x-layout.main title="Áreas">
  @push('css')
    <link rel="stylesheet" href="{{ asset('css/areas.css') }}">
  @endpush
  @push('js')
    <script src="{{ asset('js/areas.js') }}"></script>
  @endpush
  <section class="card p-2 flex-row container-fluid d-flex justify-content-between" style="margin-top: -0.75rem">
    <x-search placeholder="Buscar área..."/>
    <x-button icon="plus" >Añadir</x-button>
  </section>
  <section class="container-fluid">
    <div class="row px-3">
      <div class="col-sm-6 col-md-4 mb-3">
        <div class="card h-100">
          <div class="card-body">
            <div class="area-card">
              <div class="area-title">
                <h3 class="m-0">Informática</h3>
                <p class="m-0">PNF:  
                  <span class="font-weight-bold">PNF en Informática</span>
                </p>
              </div>
              <div class="area-buttons">
                <button class="btn btn-primary d-block d-sm-inline-block">Editar</button>
                <button class="btn btn-danger d-block d-sm-inline-block">Eliminar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 mb-3">
        <div class="card h-100">
          <div class="card-body">
            <div class="area-card">
              <div class="area-title">
                <h3 class="m-0">Administración</h3>
                <p class="m-0">PNF:  
                  <span class="font-weight-bold">PNF en Administración</span>
                </p>
              </div>
              <div class="area-buttons">
                <button class="btn btn-primary d-block d-sm-inline-block">Editar</button>
                <button class="btn btn-danger d-block d-sm-inline-block">Eliminar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 mb-3">
        <div class="card h-100">
          <div class="card-body">
            <div class="area-card">
              <div class="area-title">
                <h3 class="m-0">Mecánica</h3>
                <p class="m-0">PNF:  
                  <span class="font-weight-bold">PNF en Instrumentación y Control</span>
                </p>
              </div>
              <div class="area-buttons">
                <button class="btn btn-primary d-block d-sm-inline-block">Editar</button>
                <button class="btn btn-danger d-block d-sm-inline-block">Eliminar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 mb-3">
        <div class="card h-100">
          <div class="card-body">
            <div class="area-card">
              <div class="area-title">
                <h3 class="m-0">Musica</h3>
                <p class="m-0">PNF:  
                  <span class="font-weight-bold">N/A</span>
                </p>
              </div>
              <div class="area-buttons">
                <button class="btn btn-primary d-block d-sm-inline-block">Editar</button>
                <button class="btn btn-danger d-block d-sm-inline-block">Eliminar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 mb-3">
        <div class="card h-100">
          <div class="card-body">
            <div class="area-card">
              <div class="area-title">
                <h3 class="m-0">Danzas</h3>
                <p class="m-0">PNF:  
                  <span class="font-weight-bold">N/A</span>
                </p>
              </div>
              <div class="area-buttons">
                <button class="btn btn-primary d-block d-sm-inline-block">Editar</button>
                <button class="btn btn-danger d-block d-sm-inline-block">Eliminar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 mb-3">
        <div class="card h-100">
          <div class="card-body">
            <div class="area-card">
              <div class="area-title">
                <h3 class="m-0">Electricidad</h3>
                <p class="m-0">PNF:  
                  <span class="font-weight-bold">PNF en Electricidad</span>
                </p>
              </div>
              <div class="area-buttons">
                <button class="btn btn-primary d-block d-sm-inline-block">Editar</button>
                <button class="btn btn-danger d-block d-sm-inline-block">Eliminar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 mb-3">
        <div class="card h-100">
          <div class="card-body">
            <div class="area-card">
              <div class="area-title">
                <h3 class="m-0">Electrónica</h3>
                <p class="m-0">PNF:  
                  <span class="font-weight-bold">PNF en Electrónica</span>
                </p>
              </div>
              <div class="area-buttons">
                <button class="btn btn-primary d-block d-sm-inline-block">Editar</button>
                <button class="btn btn-danger d-block d-sm-inline-block">Eliminar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</x-layout.main>