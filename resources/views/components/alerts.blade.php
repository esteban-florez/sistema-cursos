@props(['message' => null, 'type', 'icon'])

@if ($message = Session::get( $type ))
  <div role="alert" {{ $attributes->class(['mx-2', 'alert', 'alert-'.$type]) }}>
    @isset($icon)
    <i class="fas fa-{{ $icon }} mr-1 text-white"></i>
    @endisset
    {{ $message }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
