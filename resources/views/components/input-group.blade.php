@props(['addon' => null, 'showIcon' => null])

<div class="mb-3">
  @if($slot->isNotEmpty())
    <label for="duration">
      @if($attributes->get('required'))
        <i class="mr-1 fas fa-asterisk text-danger"></i>
      @endif
      {{ $slot }}
    </label>
  @endif
  <div class="input-group">
    <input
      class="form-control"
      autocomplete="off"
      {{ $attributes }}
    />
    <div class="input-group-append">
      @if($addon)
        <span class="input-group-text">
          {{ $addon }}
        </span>
      @endif
      {{ $append ?? '' }}
      @if($showIcon)
        <button class="btn bg-white btn-outline-light" type="button" style="width: 3rem;">
          <span class="fas fa-eye"></span>
        </button>
      @endif
    </div>
  </div>
  @error($attributes->get('name'))
    <p class="text-danger">{{ ucfirst($message) }}</p>
  @enderror
</div>