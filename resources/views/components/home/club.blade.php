@props(['club'])

<div class="card mt-2">
  <div class="row no-gutters">
    <div class="col-sm-5">
      <img class="w-100" 
        src="{{ $club->image }}" 
        alt="Imagen del Club: 
        {{ $club->name }}"
        style="height: 9.6rem"
      >
    </div>
    <div class="col-sm-7">
      <div class="card-body">
        <h5 class="mb-2">{{ $club->name }}</h5>
        <p class="text-truncate">{{ $club->description }}</p>
        <x-button url="{{ route('clubs.show', $club) }}">
          Detalles
        </x-button>
      </div>
    </div>
  </div>
</div>