@props(['students', 'incomes'])

<div class="row">
  <div class="col-6">
    <div class="small-box bg-info mb-0">
      <div class="inner">
        <h3>{{ $students }}</h3>
        <p class="font-weight-bold mb-2">Total de Usuarios</p>
      </div>
      <div class="icon">
        <i class="fas fa-users"></i>
      </div>
    </div>
  </div>
  <div class="col-6">
    <div class="small-box bg-success mb-0">
      <div class="inner">
        <h3 class="text-truncate">{{ $incomes }}</h3>
        <p class="font-weight-bold mb-2">Total de Ingresos</p>
      </div>
      <div class="icon">
        <i class="fas fa-money-bill"></i>
      </div>
    </div>
  </div>
</div>