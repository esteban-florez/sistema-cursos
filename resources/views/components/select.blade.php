@props(['default', 'options', 'color', 'icon'])

<div class="mb-3">
  @isset($icon)
  <i class="mr-1 fas fa-{{ $icon }} text-{{ $color }}"></i>
  @endisset
  <label for="{{ $attributes->get('id') }}">{{ $slot }}</label>
  <select class="form-control" {{ $attributes }}>
    @if($default)
      <option selected>Seleccionar...</option>
    @endif
    @foreach ($options as $value => $label)
      <option value="{{ $value }}">{{ $label }}</option>
    @endforeach
  </select>
</div>