<x-layout title="Categories">
  <x-card title="Category Create Form">
    <form method="POST" action="{{ route('categories.store') }}">
      @csrf

      <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-right">Category Name</label>

        <div class="col-md-6">
          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
            name="name" value="{{ old('name') }}" placeholder="Computer Accessories">

          @error('name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
      </div>

      <div class="row mb-0">
        <div class="col-md-8 offset-md-4">
          <button type="submit" class="btn btn-primary">
            Create
          </button>
          <a href="{{ url()->previous() }}" class="btn btn-danger">Cancel</a>
        </div>
      </div>
    </form>
  </x-card>
</x-layout>
