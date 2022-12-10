<div class="col-xl-3 col-md-6 mb-4">
  <div {{ $attributes->merge(['class' => 'card shadow h-100 py-2 border-left-' . $type]) }}>
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div
            {{ $attributes->merge(['class' => 'text-xs font-weight-bold text-uppercase mb-1 text-' . $type]) }}>
            {{ $title }}</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $count }}</div>
        </div>
        <div class="col-auto">
          {{ $slot }}
        </div>
      </div>
    </div>
  </div>
</div>
