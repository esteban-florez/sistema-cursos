<div class="col-sm-6 col-md-12">
  <div class="card mx-2 profile-card-shadow">
    <div class="row no-gutters">
      <div class="col-md-4">
        <img class="img-fluid h-100 rounded-left img-cover"
          src="{{ asset('img/html.png') }}"
          alt="Imagen del Curso: ">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          {{ $slot }}
        </div>
      </div>
    </div>
  </div>
</div>