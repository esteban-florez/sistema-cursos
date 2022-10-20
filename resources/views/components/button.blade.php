@props(['color' => 'primary', 'icon', 'hideText'])

<button
  {{
    $attributes
      ->class(['btn', 'btn-'.$color])
      ->merge(['type' => 'button'])
  }}
>
  @isset($icon)
  <i class="mr-1 fas fa-{{ $icon }}"></i>
  @endisset
  <span 
    @isset($hideText)
    class="d-none d-{{ $hideText }}-inline"
    @endisset
    >{{ $slot }}</span>
</button>