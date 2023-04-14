@push('css')
  <link rel="stylesheet" href="{{ asset('css/notificaciones.css') }}">
@endpush

@php
    $user = Auth::user();
@endphp

<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
  @if ($user->unreadNotifications->isNotEmpty())
    <a href="{{ route('mark-all-notifications') }}" class="dropdown-item dropdown-header">
      Marcar todo como leído
    </a>
    @foreach ($user->unreadNotifications as $notification)
      <x-layout.header.notification :notification=$notification />
      <div class="dropdown-divider"></div>
    @endforeach
  @else
    <div class="empty-notification">No tienes ninguna notificación</div>
  @endif
</div>