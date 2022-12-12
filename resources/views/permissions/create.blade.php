<x-layout title="Permissions">
  <x-card title="Permission Create Form">
    <x-form action="{{ route('permissions.store') }}">
      <x-form.input id="name" label="Permission Name" placeholder="create-user" required />

      <x-slot:actions>
        <x-submit-btn />
        <x-cancel-btn back-url="{{ route('permissions.index') }}" />
      </x-slot:actions>
    </x-form>
  </x-card>
</x-layout>
