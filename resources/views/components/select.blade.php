<select {{ $attributes }}>
  @if($default)
    <option selected>Seleccionar...</option>
  @endif
  @foreach ($options as $value => $label)
    <option value="{{ $value }}">{{ $label }}</option>
  @endforeach
</select>