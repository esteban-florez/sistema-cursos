@props(['id', 'value', 'sm' => false, 'color' => null])

@php
  // TODO -> ponerle un nombre serio a esta variable antes de presentar final JAKSDJASKD
  $mapeoPapa = [
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
    :color="$color ?? $mapeoPapa[$value]['color']"
    :icon="$mapeoPapa[$value]['icon']"
    class="{{ $sm ? 'btn-sm' : '' }}"
    type="submit"
  >
    {{ $content }}
  </x-button>
</form>