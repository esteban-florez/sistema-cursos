@props(['required' => false])

@push('js')
  <script defer src="{{ asset('js/imgPreview.js') }}"></script>
@endpush
@push('css')
  <link rel="stylesheet" href="{{ asset('css/image-input.css') }}">
@endpush

{{-- no borrar por ahora xd --}}
{{-- <div class="image-input-container d-flex justify-content-center align-items-center" id="previewWrapper">
  <span class="badge badge-3 badge-dark position-absolute user-select-none">Click para añadir imagen</span>
  <img class="img-cover" src="{{ asset('img/placeholder.jpg') }}" alt="Imagen de perfil" id="previewImg"> 
  <input type="file" name="image" id="imgInput">
</div> --}}

<label class="form-label">
  @if ($required)
  <i class="fas fa-asterisk text-danger mr-1"></i>
  @endif
  Añadir imagen:
</label>
<div class="image-input-container" id="previewWrapper">
  <img class="img-cover" src="{{ asset('img/placeholder.jpg') }}" alt="Portada del Curso" id="previewImg"> 
  <input type="file" name="image" id="imgInput" accept="image/*">
</div>