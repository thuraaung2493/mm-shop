<x-layout title="Roles">
  <x-card title="Role Update Form">
    <x-form action="{{ route('roles.update', $role->id) }}">
      <x-slot:methodDir>
        @method('PUT')
      </x-slot:methodDir>

      <x-form.input id="name" label="Role Name" old-value="{{ $role->name }}" required />

      <x-form.field id="permissions" label="Permissions">
        <div class="row">
          @foreach ($permissions as $permission)
            <div class="col-md-4">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" name="permissions[]" class="custom-control-input"
                  id="{{ $permission->name }}" value="{{ $permission->name }}"
                  {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                <label class="custom-control-label"
                  for="{{ $permission->name }}">{{ $permission->name }}</label>
              </div>
            </div>
          @endforeach
        </div>
      </x-form.field>

      <x-slot:actions>
        <x-submit-btn>Update</x-submit-btn>
        <x-cancel-btn back-url="{{ route('roles.index') }}" />
      </x-slot:actions>
    </x-form>
  </x-card>
</x-layout>
