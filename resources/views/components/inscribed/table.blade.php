@props(['enrollments', 'course'])

<x-table>
  <x-slot name="header">
    <tr>
      <th>Nombre</th>
      <th>Cédula</th>
      <th>¿UPTA?</th>
      <th>Solvencia</th>
      <th>Cupo</th>
      <th>Aprobación</th>
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
            $enrollment->solvency,
            $enrollment->status,
            $enrollment->approval,
          ]"
        :details="route('users.show', $student)"
      >
        <x-slot name="actions">
          @unless($enrollment->status === 'Inscrito')
          <form action="{{ route('enrollments.confirmation.update', $enrollment) }}" method="POST">
            @csrf
            @method('PATCH')
            <x-button type="submit" class="btn-sm" color="success" icon="check">
              Inscribir
            </x-button>
          </form>
          @endunless
          @if($course->phase === 'Finalizado')
            <x-inscribed.update-approval-buttons :enrollment="$enrollment"/>
          @endif
        </x-slot>
      </x-row>
    @endforeach
  </x-slot>
  <x-slot name="pagination">
    <div class="pagination-container">
      {{ $enrollments->links() }}
    </div>
  </x-slot>
</x-table>