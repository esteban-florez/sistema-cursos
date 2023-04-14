@props(['required' => false, 'profile' => false, 'image' => null])

@push('js')
  <script defer src="{{ asset('js/imgPreview.js') }}"></script>
@endpush
@push('css')
  <link rel="stylesheet" href="{{ asset('css/image-input.css') }}">
@endpush

@php
  $placeholder = $profile ? 'img/user-placeholder.png' : 'img/placeholder.jpg';
  $image = $image ?? $placeholder;
@endphp

<label>
  @if ($required)
    <i class="fas fa-asterisk text-danger mr-1"></i>
  @endif
  Añadir imagen:
</label>
<div class="image-input-container" id="previewWrapper">
  <img class="img-cover" id="previewImg" alt="Portada del Curso" 
    src="{{ asset($image) }}"> 
  <input type="file" name="image" id="imgInput" accept="image/*">
</div>
@error('image')
  <p class="text-danger">{{ ucfirst($message) }}</p>
@enderror