@props(['options', 'notitle' => false, 'firstEmpty' => false, 'checked' => ''])
{{-- TODO -> mover lógica a una clase de componente --}}
@unless ($notitle)
<h5>{{ $slot }}</h5>
@endunless
<div class="mb-3">
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
</div>

@error($attributes->get('name'))
  <p class="text-danger">{{ ucfirst($message) }}</p>
@enderror