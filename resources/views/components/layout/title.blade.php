<section class="card px-3 py-2">
  <div class="d-flex justify-content-between align-items-center">
    <div class="d-flex flex-column">
      <h1>{{ $slot }}</h1>
      @isset($subtitle)   
      <h5 class="m-0">{{ $subtitle }}</h5>
      @endisset
    </div>
    <x-layout.breadcrumbs/>
  </div>
</section>