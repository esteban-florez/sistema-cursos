@props(['data', 'edit' => false, 'details' => false, 'actions' => null])

<tr>
  @foreach ($data as $cell)
    <td>{{ $cell }}</td>
  @endforeach
  @if ($edit || $details || $actions)
  <td class="px-2">
    <div class="d-flex gap-1 justify-content-center align-items-center h-100">
        {{ $actions ?? '' }}
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
      </div>
    </td>
  @endif
</tr>