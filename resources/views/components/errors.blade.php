@if ($errors->any())
  <div class="alert alert-danger">
    <p>¡Oops! Ocurrieron los siguientes errores: </p>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ ucfirst($error) }}</li>
      @endforeach
    </ul>
  </div>
@endif