<x-layout title="Categories">
  <x-card title="Categories List">
    <x-slot:action>
      <a href="{{ route('categories.create') }}" class="btn btn-secondary">
        <i class="fas fa-plus-circle"></i>
        Add</a>
    </x-slot:action>

    <x-table>
      <x-slot:thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Subcategory Count</th>
          <th>Total Items Count</th>
          <th>Created</th>
          <th></th>
        </tr>
      </x-slot:thead>
      <x-slot:tbody>
        <x-empty-row :resources="$categories" colspan="6" />
        @foreach ($categories as $category)
          <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->subcategoriesCount() }}</td>
            <td>{{ $category->itemsCount() }}</td>
            <td>{{ $category->created_at->toFormattedDateString() }}</td>
            <td>
              <x-actions edit-route="{{ route('categories.edit', $category->id) }}"
                delete-route="{{ route('categories.destroy', $category->id) }}"
                id="{{ $category->id }}" />
            </td>
          </tr>
        @endforeach
      </x-slot:tbody>
    </x-table>
    {{ $categories->links() }}
  </x-card>

  @push('scripts')
    @vite(['resources/js/app.js'])
  @endpush
</x-layout>
