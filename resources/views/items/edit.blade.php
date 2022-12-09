<x-layout title="Items">
  <x-card title="Item Edit Form">
    <form method="POST" action="{{ route('items.update', $item->id) }}">
      @csrf
      @method('PUT')

      <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-right">Item Name</label>

        <div class="col-md-6">
          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
            name="name" value="{{ old('name', $item->name) }}" placeholder="Computer">

          @error('name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
      </div>

      <div class="row mb-3">
        <label for="price" class="col-md-4 col-form-label text-md-right">Item Price</label>

        <div class="col-md-6">
          <div class="input-group">
            <span class="input-group-text">MMK</span>
            <input type="text" class="form-control @error('price') is-invalid @enderror"
              name="price" value="{{ old('price', $item->price->value()) }}" required
              aria-label="Amount (MMK)" placeholder="1000000">
          </div>

          @error('price')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
      </div>

      <div class="row mb-3">
        <label for="quantity" class="col-md-4 col-form-label text-md-right">Item Quantity</label>

        <div class="col-md-6">
          <input id="quantity" type="number" min="1" value="1"
            class="form-control @error('quantity') is-invalid @enderror" name="quantity"
            value="{{ old('quantity', $item->quantity) }}">

          @error('quantity')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
      </div>

      <div class="row mb-3">
        <label for="status" class="col-md-4 col-form-label text-md-right">Item Status</label>

        <div class="col-md-6">
          <select class="form-control custom-select" id="status" name="status">
            @foreach ($statuses as $status)
              <option value="{{ $status }}" @selected(old('status', $item->status) == $status)>
                {{ strtoupper($status) }}
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

      <div class="row mb-3">
        <label for="subcategory_id" class="col-md-4 col-form-label text-md-right">Choose
          Subcategory</label>

        <div class="col-md-6">
          <select class="form-control custom-select" id="subcategory_id" name="subcategory_id">
            @foreach ($subcategories as $subcategory)
              <option value="{{ $subcategory->id }}" @selected(old('subcategory_id', $item->subcategory_id) == $subcategory->id)>
                {{ $subcategory->name }}
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
            Update
          </button>
          <a href="{{ url()->previous() }}" class="btn btn-danger">Cancel</a>
        </div>
      </div>
    </form>
  </x-card>
</x-layout>
