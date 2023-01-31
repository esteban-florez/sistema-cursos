@props(['id', 'value', 'sm' => false, 'color' => null])

@php
  $styles = [
    'Confirmado' => [
      'icon' => 'check',
      'color' => 'success',
    ],
    'Rechazado' => [
      'icon' => 'times',
      'color' => 'warning',
    ],
    'Pendiente' => [
      'icon' => 'clock',
      'color' => 'secondary',
    ],
  ];

  $content = match ($value) {
    'Confirmado' => 'Confirmar',
    'Rechazado' => 'Rechazar',
    default => $value, 
  }
@endphp

<form method="POST" class="d-inline" action="{{ route('payments.status.update', $id) }}">
  @csrf
  @method('PATCH')
  <input type="hidden" name="status" value="{{ $value }}">
  <x-button 
    :color="$color ?? $styles[$value]['color']"
    :icon="$styles[$value]['icon']"
    class="{{ $sm ? 'btn-sm' : '' }}"
    type="submit"
  >
    {{ $content }}
  </x-button>
</form>