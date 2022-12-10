<x-layout title="Subcategories">
  <x-card title="Subcategories Create Form">
    <x-form action="{{ route('subcategories.store') }}">
      <x-form.input id="name" label="Subcategory Name" placeholder="Computer" required />

      <x-form.select id="category_id" label="Choose Category">
        @foreach ($categories as $category)
          <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
            {{ $category->name }}
          </option>
        @endforeach
      </x-form.select>

      <x-slot:actions>
        <x-submit-btn />
        <x-cancel-btn />
      </x-slot:actions>
    </x-form>
  </x-card>
</x-layout>
