<div {{ $attributes }} class="modal fade" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        {{ $header }}
      </div>
      <div class="modal-body">
        {{ $slot }}
      </div>
      @isset($footer)
      <div class="modal-footer justify-content-between">
        {{ $footer }}
      </div>
      @endisset
    </div>
  </div>
</div>