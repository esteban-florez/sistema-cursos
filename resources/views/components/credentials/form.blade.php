@props(['type', 'title', 'credential'])

@php
  $routePrefix = $title === 'transferencia' ? 'transfer' : 'movil';
  $routeSuffix = $type === 'Editar' ? 'update' : 'store'; 
  $route = "{$routePrefix}.{$routeSuffix}"
@endphp

<x-modal {{ $attributes }}>
  <x-slot name="header">
    <h4 class="modal-title">{{ $type }} datos de {{ $title }}</h4>
    <button type="button" class="close" data-dismiss="modal">
      <span class="text-white">&times;</span>
    </button>
  </x-slot>
  <form method="POST" action="{{route($route)}}">
    @csrf
    @if($type === 'Editar')
      @method('PUT')
    @endif
    <x-field name="ci" id="ci" placeholder="Ej. V-12.345.678" :value="old('ci') ?? $credential->ci ?? ''" required>
      Cédula: 
    </x-field>
    <x-field name="bank" id="bank" placeholder="Ej. Bancoejemplo (0101)" :value="old('bank') ?? $credential->bank ?? ''" required>
      Banco: 
    </x-field>
    @if ($title === 'transferencia')
    <x-field name="name" id="name" placeholder="Ej. Edeblangel Vanegas" :value="old('name') ?? $credential->name ?? ''" required>
      Nombre del beneficiario: 
    </x-field>
    <x-field name="account" id="account" placeholder="Ej. 02052050450284012969" :value="old('account') ?? $credential->account ?? ''" required>
      Nro. de cuenta: 
    </x-field>
    <x-select name="type" id="type" :options="accountTypes()->pairs()" :selected="old('type') ?? $credential->type ?? null" required default>
      Tipo de cuenta: 
    </x-select>
    @else
    <x-field name="phone" id="phone" placeholder="Ej. 0412-1234567" :value="old('phone') ?? $credential->phone ?? ''" required>
      Teléfono: 
    </x-field>
    @endif
    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
    <button class="btn btn-success" type="submit">Aceptar</button>
  </form>
</x-modal>