@props(['notification'])

<div class="box-notification">
  <x-button :url="$notification->data['url']" class="dropdown-item px-2">
    <div class="d-flex">
      <span class="icon-notification fas fa-{{ $notification->data['icon'] }}"></span>
      <div class="content-notification">
        <h3 class="dropdown-item-title">
          {{ $notification->data['title'] }}
        </h3>
        <p class="name-notification">{{ $notification->data['name'] }}</p>
        <p class="time-notification">
          <i class="far fa-clock"></i>
          {{ $notification->data['time'] }}
        </p>
      </div>
    </div>
  </x-button>
  <div class="button-notification">
    <a href="{{ route('mark-notification', $notification) }}">
      <span class="fas fa-times"></span>
    </a>
  </div>
</div>
