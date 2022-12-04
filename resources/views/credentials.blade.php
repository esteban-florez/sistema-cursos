<x-layout.main title="Credenciales para pagos">
  <section class="container-fluid mt-3">
    @if($errors->any())
    <div class="alert alert-danger">
      <p>Ocurrieron los siguientes errores: </p>
      <ul>
        @foreach ($errors->all() as $message)
          <li>{{ $message }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    <x-alerts type="success" icon="plus-circle"/>
    <x-alerts type="warning" icon="edit"/>
    <x-alerts type="danger" icon="times-circle"/>
    <div class="row">
      @if($transfer)
        <x-credentials.transfer :data="$transfer" />
      @else
        <x-credentials.empty title="Transferencia" target="transfer"/>
      @endif
      @if($movil)
        <x-credentials.movil :data="$movil" />
      @else
        <x-credentials.empty title="Pago Móvil" target="movil"/>
      @endif
    </div>
  </section>
  <section>
    <x-credentials.form type="Registrar" title="pago móvil" id="movilCreate" />
    <x-credentials.form :credential="$movil" type="Editar" title="pago móvil" id="movilEdit" />
    <x-credentials.form type="Registrar" title="transferencia" id="transferCreate" />
    <x-credentials.form :credential="$transfer" type="Editar" title="transferencia" id="transferEdit" />
  </section>
</x-layout.main>