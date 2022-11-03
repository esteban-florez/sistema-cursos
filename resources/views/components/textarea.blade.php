@props([])

<div class="mb-3">
  @if($attributes->get('required'))
  <i class="mr-1 fas fa-asterisk text-danger"></i>
  @endif
  <label for="{{ $attributes->get('id') }}">{{ $slot }}</label>
  <textarea class="form-control" {{ $attributes }}></textarea>
</div>