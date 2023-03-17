@props(['id', 'value', 'sm' => false])

@php
  $styles = [
    'Activo' => [
      'icon' => 'check',
      'color' => 'success'
    ],
    'Inactivo' => [
      'icon' => 'clock',
      'color' => 'secondary'
    ],
  ];
  $contentMap = [
    'Activo' => 'Habilitar',
    'Inactivo' => 'Inhabilitar',
  ];
  $content = $contentMap[$value] ?? $value;
@endphp

<form method="POST" class="d-inline" action="{{ route('club.status.update', $id) }}">
  @csrf
  @method('PATCH')
  <input type="hidden" name="status" value="{{ $value }}">
  <x-button 
    :color="$styles[$value]['color']"
    :icon="$styles[$value]['icon']"
    class="{{ $sm ? 'btn-sm' : '' }}"
    type="submit"
  >
    {{ $content }}
  </x-button>
</form>