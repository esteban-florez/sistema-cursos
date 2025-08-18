@props(['enrollments', 'course'])

<x-table>
  <x-slot name="header">
    <tr>
      <th>Nombre</th>
      <th>Cédula</th>
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
            $enrollment->solvency,
            $enrollment->status,
            $enrollment->approval,
          ]"
      >
        <x-slot name="actions">
          @can('enrollments.confirmation.update', $enrollment)
            <form action="{{ route('enrollments.confirmation.update', $enrollment) }}" method="POST">
              @csrf
              @method('PATCH')
              <x-button type="submit" class="btn-sm" color="success" icon="check">
                Inscribir
              </x-button>
            </form>
          @endcan
          @can('enrollments.approval.update', $enrollment)
            <x-inscribed.update-approval-buttons :enrollment="$enrollment"/>
          @endcan
          @can('view', $student)
            <x-button :url="route('users.show', $student)" class="btn-sm" icon="eye">
              Detalles
            </x-button>
          @endcan
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
