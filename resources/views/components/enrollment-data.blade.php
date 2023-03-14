@props(['credentials', 'course'])

<div
  id="serialized"
  data-credentials="{{ json_encode([
    'Pago Móvil' => $credentials->movil,
    'Transferencia' => $credentials->transfer
  ]) }}"
  data-course="{{ json_encode($course) }}"
  data-back="{{ route('available-courses.index') }}"
  data-dolar="{{ route('api.dolar') }}">
</div>