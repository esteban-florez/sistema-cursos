<x-layout.main title="Manual de usuario">
  <x-slot name="breadcrumbs">
    {{ Breadcrumbs::render('help') }}
  </x-slot>
  <x-slot name="titleAddon">
    <button class="btn btn-primary" id="prev">Anterior</button>
    <button class="btn btn-primary" id="next">Siguiente</button>
  </x-slot>
  @push('js')
    <script defer src="{{ asset('js/pdfjs.js') }}"></script>
    <script defer src="{{ asset('js/help.js') }}"></script>
  @endpush
  <section class="container-fluid">
    <div class="d-flex justify-content-center my-2" style="width: auto;">
      <canvas data-pdf="{{ asset('manual.pdf') }}"
        data-worker="{{ asset('js/pdfworker.js') }}" 
        id="manual" 
        style="border: 1px solid black; direction: ltr;">
      </canvas>
    </div>
  </section>
</x-layout.main>