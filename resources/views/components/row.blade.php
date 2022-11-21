@props(['data', 'edit' => false, 'details' => false, 'delete' => false])

@php
  $actions = $edit || $details || $delete;
@endphp

<tr>
  @foreach ($data as $cell)
    <td>{{ $cell }}</td>
  @endforeach
  @if($actions)
    <td class="px-2">
      <div class="d-flex gap-1 justify-content-center align-items-center h-100">
        @if ($edit)
          <x-button class="btn-sm" :url="$edit" color="warning" icon="edit" hide-text="md">
            Editar
          </x-button>
        @endif
        @if ($details)
          <x-button class="btn-sm" :url="$details" icon="eye" hide-text="md">
            Detalles
          </x-button>
        @endif
        @if ($delete)
        <form method="POST" action="{{ $delete }}">
          @csrf
          @method('DELETE')
          <x-button class="btn-sm" type="submit" color="danger" icon="times" hide-text="md">
            Eliminar
          </x-button>
        </form>
        @endif
      </div>
    </td>
  @endif
</tr>