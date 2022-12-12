<x-layout title="Items">
  <x-card title="Item Create Form">
    <x-form action="{{ route('items.store') }}">
      <x-form.input id="name" label="Item Name" placeholder="Computer" required />
      <x-form.input id="price" label="Item Price (MMK)" placeholder="10000" required />
      <x-form.input id="quantity" label="Item Quantity" type="number" min="0" value="1" required />

      <x-form.select id="status" label="Item Status">
        @foreach ($statuses as $status)
          <option value="{{ $status }}" @selected(old('status') == $status)>
            {{ strtoupper($status) }}
          </option>
        @endforeach
      </x-form.select>

      <x-form.select id="subcategory_id" label="Choose
          Subcategory">
        @foreach ($subcategories as $subcategory)
          <option value="{{ $subcategory->id }}" @selected(old('subcategory_id') == $subcategory->id)>
            {{ $subcategory->name }}
          </option>
        @endforeach
      </x-form.select>

      <x-slot:actions>
        <x-submit-btn />
        <x-cancel-btn back-url="{{ route('items.index') }}" />
      </x-slot:actions>
    </x-form>
  </x-card>
</x-layout>
