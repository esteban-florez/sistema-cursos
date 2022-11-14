@push('js')
  <script defer src="{{ asset('js/imgPreview.js') }}"></script>
@endpush

<div class="image-input-container d-flex justify-content-center align-items-center" id="previewWrapper">
  <span class="badge badge-3 badge-dark position-absolute user-select-none">Click para añadir imagen</span>
  <img class="img-cover" src="{{ asset('img/placeholder.jpg') }}" alt="Imagen de perfil" id="previewImg"> 
  <input type="file" name="image" id="imgInput">
</div>