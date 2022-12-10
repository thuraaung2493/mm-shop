<x-layout title="Permissions">
  <x-card title="Permission Update Form">
    <x-form action="{{ route('permissions.update', $permission->id) }}">
      <x-slot:methodDir>
        @method('PUT')
      </x-slot:methodDir>

      <x-form.input id="name" label="Permission Name" old-value="{{ $permission->name }}"
        required />

      <x-slot:actions>
        <x-submit-btn>Update</x-submit-btn>
        <x-cancel-btn />
      </x-slot:actions>
    </x-form>
  </x-card>
</x-layout>
