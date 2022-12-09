<x-layout title="Users">
  <x-card title="Users List">
    <x-slot:action>
      <a href="{{ route('users.create') }}" class="btn btn-secondary">
        <i class="fas fa-plus-circle"></i>
        Add</a>
    </x-slot:action>

    <x-table>
      <x-slot:thead>
        <tr>
          <th>#</th>
          <th>name</th>
          <th>Email</th>
          <th>Role</th>
          <th>Activated At</th>
          <th></th>
          <th></th>
        </tr>
      </x-slot:thead>
      <x-slot:tbody>
        @foreach ($users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ 'Admin' }}</td>
            <td>{{ $user->activated_at?->toFormattedDateString() ?? '-' }}</td>
            <th>
              @if ($user->isActivated())
                <a class="btn btn-danger deactivateBtn"
                  data-url="{{ route('users.deactivate', $user) }}"
                  href="{{ route('users.deactivate', $user) }}">Deactivate</a>
              @else
                <a class="btn btn-success activateBtn" data-url="{{ route('users.activate', $user) }}"
                  href="{{ route('users.activate', $user) }}">Activate</a>
              @endif
            </th>
            <th>
              <x-actions edit-route="{{ route('users.edit', $user->id) }}"
                delete-route="{{ route('users.destroy', $user->id) }}" id="{{ $user->id }}" />
            </th>
          </tr>
        @endforeach
      </x-slot:tbody>
    </x-table>
    {{ $users->links() }}
  </x-card>

  @push('scripts')
    @vite(['resources/js/app.js'])
  @endpush
</x-layout>
