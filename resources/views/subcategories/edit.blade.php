<x-layout title="Subcategories">
  <x-card title="Subcategories Update Form">
    <x-form action="{{ route('subcategories.update', $subcategory->id) }}">
      <x-slot:methodDir>
        @method('PUT')
      </x-slot:methodDir>

      <x-form.input id="name" label="Subcategory Name" old-value="{{ $subcategory->name }}"
        required />

      <x-form.select id="category_id" label="Choose Category">
        @foreach ($categories as $category)
          <option value="{{ $category->id }}" @selected(old('category_id', $subcategory->category_id) == $category->id)>
            {{ $category->name }}
          </option>
        @endforeach
      </x-form.select>

      <x-slot:actions>
        <x-submit-btn>Update</x-submit-btn>
        <x-cancel-btn />
      </x-slot:actions>
    </x-form>
  </x-card>
</x-layout>
