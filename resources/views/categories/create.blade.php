<x-layout title="Categories">
  <x-card title="Category Create Form">
    <x-form action="{{ route('categories.store') }}">
      <x-form.input id="name" label="Category Name" placeholder="Computer Accessories" required />

      <x-slot:actions>
        <x-submit-btn />
        <x-cancel-btn back-url="{{ route('categories.index') }}" />
      </x-slot:actions>
    </x-form>
  </x-card>
</x-layout>
