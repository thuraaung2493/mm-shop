<x-form.field id="" label="">
  <div class="custom-control custom-checkbox">
    <input type="checkbox" name="{{ $id }}" class="custom-control-input"
      id="{{ $id }}" {{ $attributes }}>
    <label class="custom-control-label" for="{{ $id }}">{{ $slot }}</label>
  </div>
</x-form.field>
