<x-layout title="Users">
  <x-card title="User Create Form">
    <x-form action="{{ route('users.store') }}">
      <x-form.input id="name" label="User Name" placeholder="Aung Aung" required />
      <x-form.input id="email" label="User Email" type="email" placeholder="aung@gmail.com"
        required />
      <x-form.input id="password" label="Password" type="password" required />
      <x-form.input id="password_confirmation" label="Password Confirm" type="password" required />

      <x-form.select id="roles[]" label="Choose Roles" multiSelect="true" multiple="multiple">
        @foreach ($roles as $role)
          <option value="{{ $role->name }}">{{ str($role->name)->title() }}</option>
        @endforeach
      </x-form.select>

      <x-form.checkbox id="is_activated">Activated</x-form.checkbox>

      <x-slot:actions>
        <x-submit-btn />
        <x-cancel-btn back-url="{{ route('users.index') }}" />
      </x-slot:actions>
    </x-form>
  </x-card>

  @push('scripts')
    @vite(['resources/js/app.js'])
  @endpush
</x-layout>
