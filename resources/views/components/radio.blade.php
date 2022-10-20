<div class="p-3">
  <h5>{{ $slot }}</h5>
  @foreach ($options as $value => $label)
  @php
    $id = $value.'Radio';
  @endphp
  <div class="form-check">
    <input class="form-check-input" type="radio" name="{{ $name }}" id="{{ $id }}" value="{{ $value }}">
    <label class="form-check-label" for="{{ $id }}">{{ $label }}</label>
  </div>
  @endforeach
</div>