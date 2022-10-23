@props(['default', 'options'])

<div class="mb-3">
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