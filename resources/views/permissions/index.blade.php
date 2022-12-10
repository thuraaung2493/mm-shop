<x-layout title="Permissions">
  <x-card title="Permissions List">
    <x-slot:action>
      <a href="{{ route('permissions.create') }}" class="btn btn-secondary">
        <i class="fas fa-plus-circle"></i>
        Add</a>
    </x-slot:action>

    <x-table>
      <x-slot:thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Created</th>
          <th></th>
        </tr>
      </x-slot:thead>
      <x-slot:tbody>
        @foreach ($permissions as $permission)
          <tr>
            <td>{{ $permission->id }}</td>
            <td>{{ $permission->name }}</td>
            <td>{{ $permission->created_at->toFormattedDateString() }}</td>
            <td>
              <x-actions edit-route="{{ route('permissions.edit', $permission->id) }}"
                delete-route="{{ route('permissions.destroy', $permission->id) }}"
                id="{{ $permission->id }}" />
            </td>
          </tr>
        @endforeach
      </x-slot:tbody>
    </x-table>
    {{ $permissions->links() }}
  </x-card>

  @push('scripts')
    @vite(['resources/js/app.js'])
  @endpush
</x-layout>
