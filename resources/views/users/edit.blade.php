<x-layout title="Users">
  <x-card title="User Update Form">
    <x-form action="{{ route('users.update', $user->id) }}">
      <x-slot:methodDir>
        @method('PUT')
      </x-slot:methodDir>

      <x-form.input id="name" label="User Name" old-value="{{ $user->name }}" required />
      <x-form.input id="email" label="Email Address" type="email" old-value="{{ $user->email }}"
        required />

      <x-form.select id="roles[]" label="Choose Roles" multiSelect="true" multiple="multiple">
        @foreach ($roles as $role)
          <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
            {{ str($role->name)->title() }}
          </option>
        @endforeach
      </x-form.select>

      <x-slot:actions>
        <x-submit-btn>Update Profile</x-submit-btn>
        <x-cancel-btn back-url="{{ route('users.index') }}" />
      </x-slot:actions>
    </x-form>
  </x-card>

  <x-card title="Password Update Form">
    <x-form action="{{ route('users.password.update', $user->id) }}">
      <x-slot:methodDir>
        @method('PUT')
      </x-slot:methodDir>

      <x-form.input id="password" label="New Password" type="password" required />
      <x-form.input id="password_confirmation" label="New Password Confirm" type="password" required />

      <x-slot:actions>
        <x-submit-btn>Update Password</x-submit-btn>
        <x-cancel-btn back-url="{{ route('users.index') }}" />
      </x-slot:actions>
    </x-form>
  </x-card>

  @push('scripts')
    @vite(['resources/js/app.js'])
  @endpush
</x-layout>
