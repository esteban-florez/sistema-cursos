@if ($errors->any())
  <div class="alert alert-danger d-flex justify-content-between m-2" role="alert">
    <div>
      <p class="mb-0">¡Oops! Ocurrieron los siguientes errores: </p>
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ ucfirst($error) }}</li>
        @endforeach
      </ul>
    </div>
    <button type="button" class="close" data-dismiss="alert">
      <span>&times;</span>
    </button>
  </div>
@endif
