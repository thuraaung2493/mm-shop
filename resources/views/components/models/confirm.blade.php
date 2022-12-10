@props(['title', 'size' => '', 'id' => 'confirmModal', 'scroll' => false])

<div class="modal fade" id="{{ $id }}" tabindex="-1" role="dialog"
  aria-labelledby="{{ $id }}Label" aria-hidden="true">
  <div
    class="modal-dialog {{ $size }} modal-dialog-centered {{ $scroll ? 'modal-dialog-scrollable' : '' }}"
    role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="{{ $id }}Label">{{ $title }}</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        {{ $slot }}
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        {{ $action }}
      </div>
    </div>
  </div>
</div>
