<x-layout.main title="Pagos">
  <x-select2/>
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('payments.index') }}
  </x-slot>
  @push('js')
    <script defer type="module" src="{{ asset('js/payments/editPayment.js') }}"></script>
  @endpush
  <x-layout.bar>
    <div class="d-flex align-items-center gap-1">
      <span class="h6 mb-0">Buscar por cédula: </span>  
      <x-search
        placeholder="Ej. 12345678" name="search" 
        :value="$search" :filters="$filters" :sort="$sort"/>
    </div>
    <div>
      <x-button icon="file-download" hide-text="md" :url="route('pdf.payments')">
        Generar PDF
      </x-button>
      <x-button icon="filter" hide-text="sm" data-target="#filtersCollapse" data-toggle="collapse">Filtros</x-button>
    </div>
    <x-slot name="filtersCollapse">
      <x-filters-collapse>
        <x-slot name="filters">
          <x-select :options="$courses" id="courseId" name="filters|course_id" :selected="$filters['course_id'] ?? null">
            Curso
          </x-select>
          <x-select :options="payTypes()->pairs()" id="type" name="filters|type" :selected="$filters['type'] ?? null">
            Tipo
          </x-select>
        </x-slot>
        <x-select :options="payStatuses()->pairs()" id="status" name="filters|status" :selected="$filters['status'] ?? null">
          Estado
        </x-select>
        <x-slot name="sorts">
          <x-radio :options="['' => 'Fecha', 'amount' => 'Monto']" name="sort" :checked="$sort" notitle/>
        </x-slot>
      </x-filters-collapse>
    </x-slot>
  </x-layout.bar>
  <section class="container-fluid">
    <x-alert />
    @if ($payments->isNotEmpty())
      <x-table>
        <x-slot name="header">
          <th>Estudiante</th>
          <th>Curso</th>
          <th>Monto</th>
          <th>Fecha</th>
          <th>Categoría</th>
          <th>Ref.</th>
          <th>Tipo</th>
          <th>Estado</th>
          <th>Acciones</th>
        </x-slot>
        <x-slot name="body">
          @foreach ($payments as $payment)
            <x-row :data="[
              $payment->enrollment->student->full_ci,
              $payment->enrollment->course->name,
              $payment->full_amount,
              $payment->updated_at->format(DF),
              $payment->category,
              $payment->ref ?? '----',
              $payment->type,
              $payment->status,
              ]"
            >
              <x-slot name="actions">
                @foreach (payStatuses() as $status)
                  @unless($status === $payment->status)
                    <x-payment.status-button :id="$payment->id" :value="$status" sm/>
                  @endunless
                @endforeach
              </x-slot>
            </x-row>
          @endforeach
        </x-slot>
        <x-slot name="pagination">
          <div class="pagination-container">
            {{ $payments->links() }}
          </div>
        </x-slot>
      </x-table>
    @else
      <div class="empty-container">
        <h2 class="empty">No hay pagos disponibles</h2>
      </div>
    @endif
  </section>
</x-layout.main>