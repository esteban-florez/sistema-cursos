<x-layout.main title="Pagos">
  @push('css')
    <link rel="stylesheet" href="{{ asset('css/pagos.css') }}">
  @endpush
  <section class="card p-2 flex-row container-fluid d-flex justify-content-between">
    <x-search placeholder="Buscar pago..." />
    {{-- TODO -> Select para cursos --}}
    <x-button icon="plus">Filtros</x-button>
  </section>

  <section class="container-fluid">
    <div class="callout callout-secondary">
      <div class="row d-flex align-items-center pay-callout">
        <div class="col-5 col-sm-6 col-md-5 d-flex aling-items-center gap-2">
          <x-button color="none" icon="chevron-down" data-toggle="collapse" data-target="#collapsePay" aria-expanded="false" aria-controls="collapsePay"></x-button>
          <div class="d-flex flex-column">
            <span><b>Fecha:</b> 07/09/2022</span>
            <span><b>Referencia:</b> 839283298</span>
          </div>
        </div>
        <div class="col-5 col-sm-4">
          <h4 class="mb-0 text-success">145,00 Bs.D</h4>
        </div>
        <div class="col-2 col-md-3 d-flex flex-column">
          <x-button type="submit" icon="check" hideText="md" class="btn-xs mb-1">Aceptar</x-button> 
          <x-button color="secondary" icon="times" hideText="md" class="btn-xs">cancelar</x-button>
        </div>
      </div>

      <div class="collapse mt-3" id="collapsePay">
        <hr class="mt-0">
        <div class="d-sm-flex">
          <h5 class="mb-0 mr-2">Datos del pago:</h5>
          <h4 class="text-muted">Por verificar</h4>
        </div>
        <ul class="list-group py-2 w-100 mx-0 pay-md-grid"> 
          <li class="list-group-item d-flex justify-content-between br-tl-md">
            <span class="text-primary">Curso:</span>
            <span>Programación web</span>
          </li>
          <li class="list-group-item d-flex justify-content-between br-tr-md">
            <span class="text-primary">Tipo de pago:</span>
            <span>Pago Móvil</span>
          </li>
          <li class="list-group-item d-flex justify-content-between br-bl-md">
            <span class="text-primary">Estudiante:</span>
            <span>Myriam Yaqueno</span>
          </li>
          <li class="list-group-item d-flex justify-content-between br-br-md">
            <span class="text-primary">Teléfono:</span>
            <span>+241-62188690</span>
          </li>
          <li class="list-group-item d-flex justify-content-between br-bl-md">
            <span class="text-primary">Dato:</span>
            <span>Random</span>
          </li>
          <li class="list-group-item d-flex justify-content-between br-br-md">
            <span class="text-primary">Banco:</span>
            <span>Mercantil</span>
          </li>
        </ul>
      </div>
    </div>
  </section>
</x-layout.main>