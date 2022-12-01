<x-layout.main title="">
  @push('css')
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">
  @endpush

  <!-- Hay muchas cosas que arreglar aquí en el home, pero, yastoi harta ptm jasjajskajk -->

  <!-- TODO -> Hacer la vista segun que roles -->
  <!-- TODO -> Hacer un controlador para poner los datos de cursos, clubes y pagos -->
  <!-- TODO -> Hacer bien las card de los club, agarre la del perfil por ahora -->
  <!-- TODO -> Hacer del carrusel un componente componente -->
  <!-- TODO -> Terminar el carrusel con los datos del curso -->

  <section class="container fluid px-sm-4">
    <div class="row mt-3">
      <div class="col-md-7 col-lg-8">
        <div class="card p-2 mb-2 text-center">
          <h2 class="mb-0">¡Últimos cursos!</h2>
        </div>
        <div id="carouselIndicators" class="carousel slide" data-ride="carousel" data-interval="7000">
          <ol class="carousel-indicators">
            <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselIndicators" data-slide-to="1"></li>
            <li data-target="#carouselIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="{{ asset('img/ajedrez.jpg') }}" class="w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="{{ asset('img/sample2.jpg') }}" class="w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="{{ asset('img/sample1.jpg') }}" class="w-100" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-target="#carouselIndicators" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-target="#carouselIndicators" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </button>
        </div>
      </div>
      <div class="col-md-5 col-lg-4">
        <div class="card">
          <div class="card-body d-flex flex-column justify-content-center align-items-center py-2">
            <h4 class="mb-0">8:30 PM</h4>
            <h4 class="mb-0">30/11/2022</h4>
          </div>
        </div>
        <div class="card card-dark">
          <div class="card-header">
            <h5 class="mb-0">Pagos pendientes</h5>
          </div>
          <div class="card-body p-3 payment-container">
            <!-- <div class="card mb-2">
              <div class="card-body p-2">
                <h5>Programación Web</h5>
                <h6 class="mb-0 text-success">Monto total: 45$</h6>
              </div>
            </div>
            <div class="card mb-2">
              <div class="card-body p-2">
                <h5>Programación Web</h5>
                <h6 class="mb-0 text-success">Monto total: 45$</h6>
              </div>
            </div> -->
            <div class="empty-container">
              <div class="empty">No hay pagos pendientes</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h3 class="mb-0">Clubes destacados</h3>
      </div>
      <div class="card-body">
        <div class="row no-gutters mt-2 w-100">
          <div class="col-6">
            <x-profile.card>
              <h5 class="mb-0">Curso de Programación Web</h5>
              <div class="badge badge-success mb-3">Aprobado</div>
              <div class="d-flex align-items-center">
                <a class="btn btn-sm btn-secondary" href="#">Certificado</a>
                <a class="btn btn-sm btn-primary mx-2" href="detalles-cursos-user.html">Detalles</a>
              </div>
            </x-profile.card>
          </div>
          <div class="col-6">
            <x-profile.card>
              <h5 class="mb-0">Curso de Programación Web</h5>
              <div class="badge badge-success mb-3">Aprobado</div>
              <div class="d-flex align-items-center">
                <a class="btn btn-sm btn-secondary" href="#">Certificado</a>
                <a class="btn btn-sm btn-primary mx-2" href="detalles-cursos-user.html">Detalles</a>
              </div>
            </x-profile.card>
          </div>
        </div>
      </div>
    </div>
  </section>
</x-layout.main>