@props(['memberships', 'club'])

<x-table>
  <x-slot name="header">
    <tr>
      <th>Nombre</th>
      <th>Cédula</th>
      <th>¿UPTA?</th>
      <th>Acciones</th>
    </tr>
  </x-slot>
  <x-slot name="body">
    @foreach ($memberships as $membership)
      @php
        $member = $membership->member;
      @endphp
      <x-row
        :data="[
            $member->full_name,
            $member->full_ci,
            $member->upta,
          ]"
        :details="route('users.show', $member->id)"
      >
      </x-row>
    @endforeach
  </x-slot>
  <x-slot name="pagination">
    <div class="pagination-container">
      {{ $memberships->links() }}
    </div>
  </x-slot>
</x-table>