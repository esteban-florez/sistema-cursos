<x-layout.main title="Pagos">
  @push('js')
    <script defer type="module" src="{{ asset('js/payments/editPayment.js') }}"></script>
  @endpush
  <x-layout.bar>
    <div class="d-flex align-items-center gap-1">
      <span class="h6 mb-0">Buscar por cédula: </span>  
      <x-search placeholder="Ej. 12345678" name="search" :value="$search"/>
    </div>
    <x-button icon="filter" hide-text="sm" data-target="#filtersCollapse" data-toggle="collapse">Filtros</x-button>
    <x-slot name="filtersCollapse">
      <x-filters-collapse>
        {{-- TODO -> en todos los filtros, hay que mejorar un poco el HTML, en el sentido de que se repite mucho esto, hay que ver como se hace. --}}
        <x-slot name="filters">
          <x-select :options="$courses" id="courseId" name="filters|course_id" :selected="$filters['course_id'] ?? ''">
            Curso
          </x-select>
          <x-select :options="$types" id="type" name="filters|type" :selected="$filters['type'] ?? ''">
            Tipo
          </x-select>
          {{-- TODO -> hacer que esto se ponga al lado, quizás mas bien convenga renombrar los slots a left y right --}}
          <x-select :options="$statuses" id="status" name="filters|status" :selected="$filters['status'] ?? ''">
            Estado
          </x-select>
        </x-slot>
      </x-filters-collapse>
    </x-slot>
  </x-layout.bar>
  <section class="container-fluid">
    <x-alerts type="success" icon="user-plus"/>
    <x-alerts type="warning" icon="user-edit"/>
    <x-alerts type="danger" icon="user-minus"/>
    <x-table>
      <x-slot name="header">
        <th>Estudiante</th>
        <th>Curso</th>
        <th>Monto</th>
        <th>Fecha</th>
        <th>Ref.</th>
        <th>Tipo</th>
        <th>Estado</th>
        <th>Acciones</th>
      </x-slot>
      <x-slot name="body">
        @forelse ($payments as $payment)
          <x-row :data="[
            $payment->registry->student->full_ci,
            $payment->registry->course->name,
            $payment->amount,
            $payment->date,
            $payment->ref,
            $payment->type,
            $payment->status,
            ]"
            :delete="route('payments.destroy', $payment->id)"
          >
            @if($payment->status === 'Pendiente')
            <x-slot name="extraActions">
              <x-payment.status-button :id="$payment->id" type="confirmed" sm/>
              <x-payment.status-button :id="$payment->id" type="rejected" sm/>
            </x-slot>
            @else
            <x-slot name="extraActions">
              <x-button class="btn-sm" color="warning" icon="edit">
                Editar
              </x-button>
            </x-slot>
            @endif
          </x-row>
        @empty
          {{-- TODO -> arreglar el empty state que se vea bonito --}}
          <p class="w-100 text-center text-muted">No hay usuarios registrado actualmente</p>
        @endforelse
      </x-slot>
      <x-slot name="pagination">
        <div class="pagination-container">
          {{ $payments->links() }}
        </div>
      </x-slot>
    </x-table>
  </section>
</x-layout.main>