@props(['message' => null, 'type', 'icon'])

@if ($message = Session::get( $type ))
  <div role="alert" {{ $attributes->class(['mx-2', 'alert', 'alert-'.$type]) }}>
    @isset($icon)
    <i class="fas fa-{{ $icon }} mr-1"></i>
    @endisset
    {{ $message }}
  </div>
@endif
