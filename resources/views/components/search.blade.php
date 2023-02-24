@props(['filters' => null, 'sort' => null])

<form method="GET">
  @if ($filters)
    @foreach ($filters as $filter => $value)
      <input type="hidden" name="filters|{{ $filter }}" value="{{ $value }}">
    @endforeach
  @endif
  @if ($sort)
    <input type="hidden" name="sort" value="{{ $sort }}">
  @endif
  <div class="input-group">
    <input autcomplete="off" class="form-control" type="search" {{ $attributes }}>
    <div class="input-group-append">
      <button class="btn btn-dark" type="submit">
        <i class="fas fa-search"></i>
      </button>
    </div>
  </div>
</form>