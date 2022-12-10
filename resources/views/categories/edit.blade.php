<x-layout title="Categories">
  <x-card title="Category Update Form">
    <x-form action="{{ route('categories.update', $category->id) }}">
      <x-slot:methodDir>
        @method('PUT')
      </x-slot:methodDir>

      <x-form.input id="name" label="Category Name" placeholder="Computer Accessories"
        old-value="{{ $category->name }}" required />

      <x-slot:actions>
        <x-submit-btn>Update</x-submit-btn>
        <x-cancel-btn />
      </x-slot:actions>
    </x-form>
  </x-card>
</x-layout>
