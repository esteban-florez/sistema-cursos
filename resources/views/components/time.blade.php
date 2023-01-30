@push('js')
  <script defer src="{{ asset('js/time.js') }}"></script>
@endpush

<div class="card w-100 d-md-inline-block d-none mb-2">
  <div class="card-body d-flex flex-column justify-content-center align-items-center py-2">
    <h3 class="mb-0" id="time">{{ now()->format(TF) }}</h3>
    <h5 class="mb-0" id="date">{{ now()->format(DF) }}</h5>
  </div>
</div>