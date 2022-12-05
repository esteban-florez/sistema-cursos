@props(['students', 'course'])

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
    @foreach ($students as $student)
      @unless($course->status !== 'Inscripciones' && $student->inscription->status === 'En reserva')
      <x-row
        :data="[
            $student->full_name,
            $student->full_ci,
            $student->is_upta,
            $student->inscription->payment->status,
            $student->inscription->status,
            $student->inscription->approved,
          ]"
        :details="route('students.show', $student->id)"
      >
        <x-slot name="extraActions">
          @unless($student->inscription->status === 'Inscrito')
          <form action="{{ route('inscription.confirmation', $student->inscription->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <x-button type="submit" class="btn-sm" color="success" icon="check">
              Inscribir
            </x-button>
          </form>
          @endunless
        </x-slot>
      </x-row>
      @endunless
    @endforeach
  </x-slot>
  <x-slot name="pagination">
    {{ $students->links() }}
  </x-slot>
</x-table>