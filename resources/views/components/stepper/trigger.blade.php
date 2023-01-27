@props(['target', 'number', 'label'])

<div class="step" data-target="{{ $target }}">
  <button type="button" class="step-trigger" role="tab">
    <span class="bs-stepper-circle">{{ $number }}</span>
    <span class="bs-stepper-label">{{ $label }}</span>
  </button>
</div>