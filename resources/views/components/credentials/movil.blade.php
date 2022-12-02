@props(['data'])

<x-credentials.card title="Pago Móvil" target="movil">
  <x-credentials.item :value="$data->ci">
    Cédula: 
  </x-credentials.item>
  <x-credentials.item :value="$data->bank">
    Banco: 
  </x-credentials.item>
  <x-credentials.item :value="$data->phone">
    Teléfono: 
  </x-credentials.item>
</x-credentials.card>