@props(['options', 'notitle' => false, 'firstEmpty' => false, 'checked' => ''])
{{-- TODO -> mover lógica a una clase de componente --}}
@unless ($notitle)
<div class="p-3">
  <h5>{{ $slot }}</h5>
@endunless
  @foreach ($options as $value => $label)
  @php
    $id = $value;
    $value = $firstEmpty && $loop->first ? '' : $value;
    $isChecked = $checked == $value;
  @endphp
  <div class="form-check">
    <input
      class="form-check-input"
      type="radio"
      id="{{ $id }}"
      value="{{ $value }}"
      {{ $attributes }}
      @if ($isChecked)
      checked
      @endif
    >
    <label class="form-check-label" for="{{ $id }}">
      {{ $label }}
    </label>
  </div>
  @endforeach
@unless ($notitle)
</div>
@endunless
@error($attributes->get('name'))
@enderror