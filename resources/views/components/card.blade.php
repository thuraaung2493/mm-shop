<div class="card shadow mb-4">
  <div class="card-header py-3 d-flex justify-content-between">
    <div class="d-flex flex-column justify-content-center">
      <h5 class="m-0 font-weight-bold text-primary">{{ $title }}</h5>
    </div>
    @isset($action)
      {{ $action }}
    @endisset
  </div>
  <div class="card-body">
    {{ $slot }}
  </div>
</div>
