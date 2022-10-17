@props(['color', 'toggle', 'target', 'icon', 'hideText'])

<button
  {{$attributes->class(['btn', 'btn-'.($color??'primary')])}}
  @isset($toggle)
  data-toggle="{{$toggle}}"
  @endisset
  @isset($target)
  data-target="#{{$target}}"
  @endisset
>
  @isset($icon)
  <i class="mr-1 fas fa-{{$icon}}"></i>
  @endisset
  <span 
    @isset($hideText)
    class="d-none d-{{$hideText}}-inline"
    @endisset
    >{{ $slot }}</span>
</button>