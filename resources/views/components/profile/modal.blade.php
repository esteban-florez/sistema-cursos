@props(['user'])

@push('js')
  <script defer src="{{ asset('js/imgPreview.js') }}"></script>
@endpush
@push('css')
  <link rel="stylesheet" href="{{ asset('css/profile-modal.css') }}">
@endpush

<x-modal id="profileImgModal">
  <x-slot name="header">
    <h4 class="modal-title">Cambiar imagen de perfil</h4>
    <button type="button" class="close" data-dismiss="modal">
      <span class="text-white">&times;</span>
    </button>
  </x-slot>
  <p class="alert alert-info">Haz click en la imagen para subir una nueva foto de perfil.</p>
  <form method="POST" enctype="multipart/form-data" action="{{ route('users.image.update', $user) }}">
    @method('PATCH')
    @csrf
    <div class="image-input-container" id="previewWrapper">
      <img class="img-cover" id="previewImg" src="{{ asset('img/user-placeholder.png') }}"> 
      <input type="file" name="image" id="imgInput" accept="image/*">
      @error('image')
        <p class="text-danger">{{ ucfirst($message) }}</p>
      @enderror
    </div>
    <div class="d-flex w-100 justify-content-center gap-2">
      <x-button type="submit" color="success" icon="check" id="send" disabled>
        Aceptar
      </x-button>
      <x-button color="danger" icon="times" data-dismiss="modal">
        Cancelar
      </x-button>
    </div>
  </form>
</x-modal>