<x-layout title="Items">
  <x-card title="Item Edit Form">
    <x-form action="{{ route('items.update', $item->id) }}">
      <x-slot:methodDir>
        @method('PUT')
      </x-slot:methodDir>

      <x-form.input id="name" label="Item Name" old-value="{{ $item->name }}" required />
      <x-form.input id="price" label="Item Price (MMK)" old-value="{{ $item->price->value() }}"
        required />
      <x-form.input id="quantity" label="Item Quantity" type="number" min="0"
        old-value="{{ $item->quantity }}" required />

      <x-form.select id="status" label="Item Status">
        @foreach ($statuses as $status)
          <option value="{{ $status }}" @selected(old('status', $item->status->value) == $status)>
            {{ strtoupper($status) }}
          </option>
        @endforeach
      </x-form.select>

      <x-form.select id="subcategory_id" label="Choose
          Subcategory">
        @foreach ($subcategories as $subcategory)
          <option value="{{ $subcategory->id }}" @selected(old('subcategory_id', $item->subcategory_id) == $subcategory->id)>
            {{ $subcategory->name }}
          </option>
        @endforeach
      </x-form.select>

      <x-slot:actions>
        <x-submit-btn>Update</x-submit-btn>
        <x-cancel-btn back-url="{{ route('items.index') }}" />
      </x-slot:actions>
    </x-form>
  </x-card>
</x-layout>
