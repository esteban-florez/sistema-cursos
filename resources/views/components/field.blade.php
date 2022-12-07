@php
  $isCheckbox = $attributes->get('type') === 'checkbox';
  $required = $attributes->get('required');
@endphp

<div @class(['form-check' => $isCheckbox, 'mb-3'])>
  @isset($required)
  <i class="mr-1 fas fa-asterisk text-danger"></i>
  @endisset
  @unless ($isCheckbox)
  <label for="{{ $attributes->get('id') }}">{{ $slot }}</label>
  @endunless
  <input @if($isCheckbox)value="1"@endif{{
    $attributes
    ->class([
      'form-control' => !$isCheckbox,
      'form-check-input' => $isCheckbox,
      ])
    ->merge(['type' => 'text', 'autocomplete' => 'off'])
    }}
  >
  @if ($isCheckbox)
  <label class="form-check-label" for="{{ $attributes->get('id') }}">{{ $slot }}</label>
  @endif
  @error($attributes->get('name'))
    <p class="text-danger">{{$message}}</p>
  @enderror
</div>