@props(['enrollment'])

@php
  $colors = [
    'Aprobado' => 'success',
    'Reprobado' => 'danger',
  ];

  $text = [
    'Aprobado' => 'Aprobar',
    'Reprobado' => 'Reprobar',
  ];
  
  $icon = [
    'Aprobado' => 'check',
    'Reprobado' => 'times',
  ];

  $states = ['Aprobado', 'Reprobado']
@endphp

@foreach ($states as $value)
  @if ($enrollment->approval !== $value)
    <form action="{{ route('enrollments.approval.update', $enrollment) }}" method="POST">
      @csrf
      @method('PATCH')
      <input type="hidden" name="approval" value="{{ $value }}">
      <x-button type="submit" class="btn-sm" color="{{ $colors[$value] }}" icon="{{ $icon[$value] }}">
        {{ $text[$value] }}
      </x-button>
    </form>
  @endif
@endforeach