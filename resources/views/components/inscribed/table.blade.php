@props(['inscriptions', 'course'])

<x-table>
  <x-slot name="header">
    <tr>
      <th>Nombre</th>
      <th>Cédula</th>
      <th>¿UPTA?</th>
      <th>Solvencia</th>
      <th>Cupo</th>
      <th>¿Aprobado?</th>
      <th>Acciones</th>
    </tr>
  </x-slot>
  <x-slot name="body">
    @foreach ($inscriptions as $inscription)
      @php
        $student = $inscription->student;
      @endphp
      <x-row
        :data="[
            $student->full_name,
            $student->full_ci,
            $student->is_upta,
            $inscription->payment->status,
            $inscription->status,
            $inscription->approved,
          ]"
        :details="route('students.show', $student->id)"
      >
        <x-slot name="extraActions">
          @unless($inscription->status === 'Inscrito')
          <form action="{{ route('inscriptions.confirmation', $inscription->id) }}" method="POST">
            @csrf
            @method('PUT')
            <x-button type="submit" class="btn-sm" color="success" icon="check">
              Inscribir
            </x-button>
          </form>
          @endunless
          @unless($course->phase !== 'Finalizado')
            @php
              $isApproved = isset($inscription->approved_at);
              $color = $isApproved ? 'danger' : 'success';
              $text = $isApproved ? 'Reprobar' : 'Aprobar';
              $icon = $isApproved ? 'times' : 'check';
            @endphp
            <form action="{{ route('inscriptions.approval', $inscription->id) }}" method="POST">
              @csrf
              @method('PUT')
              <x-button type="submit" class="btn-sm" color="{{ $color }}" icon="{{ $icon }}">
                {{ $text }}
              </x-button>
            </form>
          @endunless
        </x-slot>
      </x-row>
    @endforeach
  </x-slot>
  <x-slot name="pagination">
    {{ $inscriptions->links() }}
  </x-slot>
</x-table>