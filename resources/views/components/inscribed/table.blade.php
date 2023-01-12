@props(['enrollments', 'course'])

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
    @foreach ($enrollments as $enrollment)
      @php
        $student = $enrollment->student;
      @endphp
      <x-row
        :data="[
            $student->full_name,
            $student->full_ci,
            $student->upta,
            $enrollment->payment->status,
            $enrollment->status,
            $enrollment->approved,
          ]"
        :details="route('students.show', $student->id)"
      >
        <x-slot name="extraActions">
          @unless($enrollment->status === 'Inscrito')
          <form action="{{ route('enrollments.confirmation.update', $enrollment->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <x-button type="submit" class="btn-sm" color="success" icon="check">
              Inscribir
            </x-button>
          </form>
          @endunless
          @unless($course->phase !== 'Finalizado')
            @php
              $isApproved = isset($enrollment->approved_at);
              $color = $isApproved ? 'danger' : 'success';
              $text = $isApproved ? 'Reprobar' : 'Aprobar';
              $icon = $isApproved ? 'times' : 'check';
            @endphp
            <form action="{{ route('enrollments.approval.update', $enrollment->id) }}" method="POST">
              @csrf
              @method('PATCH')
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
    {{ $enrollments->links() }}
  </x-slot>
</x-table>