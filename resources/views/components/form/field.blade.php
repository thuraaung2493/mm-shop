<div class="row mb-3">
  <label for="{{ $id }}"
    class="col-md-4 col-form-label text-md-right">{{ $label }}</label>

  <div class="col-md-6">
    {{ $slot }}

    @error($id)
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
</div>
