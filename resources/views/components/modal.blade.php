<div id="infoModal" class="modal fade" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        {{ $header }}
      </div>
      <div class="modal-body">
        {{ $slot }}
      </div>
      <div class="modal-footer justify-content-between">
        {{ $footer }}
      </div>
    </div>
  </div>
</div>