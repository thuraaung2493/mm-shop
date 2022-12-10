<x-layout title="Roles">
  <x-card title="Role Create Form">
    <x-form action="{{ route('roles.store') }}">
      <x-form.input id="name" label="Role Name" placeholder="role name" required />

      <x-form.field id="permissions" label="Permissions">
        <div class="row">
          @foreach ($permissions as $permission)
            <div class="col-md-4">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" name="permissions[]" class="custom-control-input"
                  id="{{ $permission->name }}" value="{{ $permission->name }}">
                <label class="custom-control-label"
                  for="{{ $permission->name }}">{{ $permission->name }}</label>
              </div>
            </div>
          @endforeach
        </div>
      </x-form.field>

      <x-slot:actions>
        <x-submit-btn />
        <x-cancel-btn />
      </x-slot:actions>
    </x-form>
  </x-card>
</x-layout>
