<x-layout.main title="Credenciales para pagos">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('credentials.index') }}
  </x-slot>
  <section class="container-fluid mt-3">
    <x-errors />
    <x-select2 />
    <x-alert />
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