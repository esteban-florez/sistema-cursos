@php
  $message = session('alert');
  
  $colors = collect([
    'editado' => 'warning',
    'creado' => 'success',
    'eliminado' => 'danger',
    'vacío' => 'danger',
  ]);

  $color = $colors
    ->filter(fn($_, $operation) => str($message)->contains($operation))
    ->first();
@endphp

@if ($message)
  <div class="alert alert-{{ $color }} mx-2 d-flex justify-content-between mb-1" role="alert">
    <div>
      <i class="fas fa-info-circle mr-1"></i>
      {{ $message }}
    </div>
    <button type="button" class="close" data-dismiss="alert">
      <i class="fas fa-times"></i>
    </button>
  </div>
@endif
