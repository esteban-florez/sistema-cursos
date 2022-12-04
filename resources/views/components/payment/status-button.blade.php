@props(['id', 'type', 'sm' => false, 'color' => null])

@php
  $isConfirmed = $type === 'confirmed';
  $icon = $isConfirmed ? 'check' : 'times';
@endphp

<form method="POST" class="d-inline" action="{{ route('payments.update', $id) }}">
  @csrf
  @method('PUT')
  <input type="hidden" name="status" value="{{ $type }}">
  <x-button class="{{ $sm ? 'btn-sm' : '' }}" type="submit" :color="$color" :icon="$icon">
    {{ $isConfirmed ? 'Confirmar' : 'Rechazar' }}
  </x-button>
</form>