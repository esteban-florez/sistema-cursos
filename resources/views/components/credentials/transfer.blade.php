@props(['data'])

<x-credentials.card title="Transferencia" target="transfer">
    <x-credentials.item :value="$data->name">
      Beneficiario: 
    </x-credentials.item>
    <x-credentials.item :value="$data->bank">
      Banco: 
    </x-credentials.item>
    <x-credentials.item :value="$data->ci">
      Cédula: 
    </x-credentials.item>
    <x-credentials.item :value="$data->account">
      Nro. de Cuenta: 
    </x-credentials.item>
    <x-credentials.item :value="$data->type">
      Tipo de Cuenta: 
    </x-credentials.item>
</x-credentials.card>