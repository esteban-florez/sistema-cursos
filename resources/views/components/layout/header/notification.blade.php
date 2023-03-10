@props(['notification'])

<button {{ url('#') }} class="dropdown-item bg-light">
  <div class="d-flex">
    <span class="icon-notification fas fa-{{ $notification->data['icon'] }}"></span>
    <div class="content-notification">
      <h3 class="dropdown-item-title">
        {{ $notification->data['title'] }}
      </h3>
      <p class="text-sm">{{ $notification->data['name'] }}</p>
      <p class="text-sm text-muted">
        <i class="far fa-clock"></i>
        {{ $notification->data['time'] }}
      </p>
    </div>
    <div class="d-flex justify-content-center align-items-center mr-2">
      <a href="{{ route('mark-notification', $notification) }}" style="color: black;">
        <span class="fas fa-times"></span>
      </a>
    </div>
  </div>
</button>