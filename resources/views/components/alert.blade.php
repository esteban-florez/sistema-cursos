@php
  $message = session('alert');
  
  $colors = collect([
    'editado' => 'warning',
    'creado' => 'success',
    'eliminado' => 'danger',
    'vacío' => 'danger',
    'unido' => 'success',
    'retirado' => 'danger',
    'registrado' => 'success',
    'confirmado' => 'success',
  ]);

  $color = $colors
    ->filter(function ($_, $operation) use ($message) {
      return str($message)->contains($operation);
    })->first();
@endphp

@if ($message)
  <div class="alert alert-{{ $color }} mx-2 d-flex justify-content-between m-2" role="alert">
    <div>
      <i class="fas fa-info-circle mr-1"></i>
      {{ $message }}
    </div>
    <button type="button" class="close" data-dismiss="alert">
      <span>&times;</span>
    </button>
  </div>
@endif
