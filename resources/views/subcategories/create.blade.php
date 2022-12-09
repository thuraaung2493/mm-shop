<x-layout title="Subcategories">
  <x-card title="Subcategories Create Form">
    <form method="POST" action="{{ route('subcategories.store') }}">
      @csrf

      <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-right">Subcategory Name</label>

        <div class="col-md-6">
          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
            name="name" value="{{ old('name') }}" placeholder="Computer">

          @error('name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
      </div>

      <div class="row mb-3">
        <label for="subcategory_id" class="col-md-4 col-form-label text-md-right">Choose
          Category</label>

        <div class="col-md-6">
          <select class="form-control custom-select" id="category_id" name="category_id">
            @foreach ($categories as $category)
              <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                {{ $category->name }}
              </option>
            @endforeach
          </select>

          @error('status')
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
