@push('css-plugins')
  <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
@endpush
@push('js-plugins')
  <script defer src="{{ asset('js/select2.min.js') }}"></script>
@endpush
@push('js')
  <script defer type="module" src="{{ asset('js/enableSelect2.js') }}"></script>
@endpush