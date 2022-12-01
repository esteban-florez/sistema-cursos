@props(['options', 'selected' => '', 'default' => false])
@php
 $required = $attributes->get('required'); 
@endphp
{{-- TODO -> estos componentes de seleccionar opciones, cuyas opciones pueden venir desde
una tabla, se podría hacer que tengan una clase propia de componente, y que ellos mismos agarren su info xd --}}
<div class="mb-3">
  @isset($required)
  <i class="mr-1 fas fa-asterisk text-danger"></i>
  @endisset
  <label for="{{ $attributes->get('id') }}">{{ $slot }}</label>
  <select class="form-control" {{ $attributes }}>
    @if ($default)
      <option>Seleccionar...</option>
    @endif
    @foreach ($options as $value => $label)
      @php
        $isSelected = $selected === (string) $value;
      @endphp
      <option value="{{ $value }}"@if($isSelected)selected @endif>{{ $label }}</option>
    @endforeach
  </select>
</div>