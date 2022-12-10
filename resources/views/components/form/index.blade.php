@props(['method' => 'POST', 'action'])

<form method="{{ $method }}" action="{{ $action }}">
  @csrf
  @isset($methodDir)
    {{ $methodDir }}
  @endisset

  {{ $slot }}

  <div class="row mb-0">
    <div class="col-md-8 offset-md-4">
      {{ $actions }}
    </div>
  </div>
</form>
