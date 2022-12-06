@props(['club', 'last' => false])

<div class="card{{$last ? '' : ' mb-0'}}">
  <div class="row no-gutters">
    <div class="col-sm-5">
      <img class="w-100 rounded-left" src="{{ $club->image }}" alt="Imagen del curso">
    </div>
    <div class="col-sm-7 d-flex align-items-center">
      <div class="card-body">
        <h5 class="mb-2">{{ $club->name }}</h5>
        <p class="card-text">{{ $club->excerpt }}</p>
        <div class="d-flex justify-content-between align-items-center">
          <x-button url="{{ route('club.show', $club->id) }}">Detalles</x-button>
        </div>
      </div>
    </div>
  </div>
</div>