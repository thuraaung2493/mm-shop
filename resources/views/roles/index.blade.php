<x-layout title="Roles">
  <x-card title="Roles List">
    <x-slot:action>
      <a href="{{ route('roles.create') }}" class="btn btn-secondary">
        <i class="fas fa-plus-circle"></i>
        Add</a>
    </x-slot:action>

    <x-table>
      <x-slot:thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Permissions</th>
          <th>Created</th>
          <th></th>
        </tr>
      </x-slot:thead>
      <x-slot:tbody>
        <x-empty-row :resources="$roles" colspan="5" />
        @foreach ($roles as $role)
          <tr>
            <td>{{ $role->id }}</td>
            <td>{{ str($role->name)->title() }}</td>
            <td>{{ toString($role->permissions, 'name') }}</td>
            <td>{{ $role->created_at->toFormattedDateString() }}</td>
            <td>
              <x-actions edit-route="{{ route('roles.edit', $role->id) }}"
                delete-route="{{ route('roles.destroy', $role->id) }}" id="{{ $role->id }}" />
            </td>
          </tr>
        @endforeach
      </x-slot:tbody>
    </x-table>
    {{ $roles->links() }}
  </x-card>

  @push('scripts')
    @vite(['resources/js/app.js'])
  @endpush
</x-layout>
