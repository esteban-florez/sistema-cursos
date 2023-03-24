@props(['validNumber' => false])


<div class="mb-3">
  @if($attributes->get('required'))
    <i class="mr-1 fas fa-asterisk text-danger"></i>
  @endif
  <label for="{{ $attributes->get('id') }}">{{ $slot }}</label>
  <input
    {{
      $attributes
        ->class(['form-control',])
        ->merge(['type' => 'text', 'autocomplete' => 'off'])
    }}
    @if($validNumber)
      {{-- IMPROVE -> 5 amigo mío xDDD --}}
      min="0"
      onkeypress="return event.charCode >= 48"
      oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength)"
    @endif
  >
  @error($attributes->get('name'))
    <p class="text-danger">{{ ucfirst($message) }}</p>
  @enderror
</div>