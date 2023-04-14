@props([])

<div class="form-check mb-3">
  @if($attributes->get('required'))
    <i class="mr-1 fas fa-asterisk text-danger"></i>
  @endif
  <input
    {{ 
      $attributes
        ->class(['form-check-input'])
        ->merge(['autocomplete' => 'off'])
    }}
  />
  <label class="form-check-label" for="{{ $attributes->get('id') }}">
    {{ $slot }}
  </label>
  @error($attributes->get('name'))
    <p class="text-danger">{{ ucfirst($message) }}</p>
  @enderror
</div>