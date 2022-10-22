@php
 $isCheckbox = $attributes->get('type') === 'checkbox';
@endphp

<div @class(['form-check' => $isCheckbox, 'mb-3'])>
  @unless ($isCheckbox)
  <label for="{{ $attributes->get('id') }}">{{ $slot }}</label>
  @endunless
  <input {{
    $attributes
    ->class([
      'form-control' => !$isCheckbox,
      'form-check-input' => $isCheckbox,
      ])
    ->merge(['type' => 'text'])
    }}
  >
  @if ($isCheckbox)
  <label class="form-check-label" for="{{ $attributes->get('id') }}">{{ $slot }}</label>
  @endif
</div>