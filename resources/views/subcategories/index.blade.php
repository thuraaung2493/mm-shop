<x-layout title="Subcategories">
  <x-card title="Subcategories List">
    <x-slot:action>
      <a href="{{ route('subcategories.create') }}" class="btn btn-secondary">
        <i class="fas fa-plus-circle"></i>
        Add</a>
    </x-slot:action>

    <x-table>
      <x-slot:thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Category</th>
          <th>Items Count</th>
          <th>Created</th>
          <th></th>
        </tr>
      </x-slot:thead>
      <x-slot:tbody>
        @foreach ($subcategories as $subcategory)
          <tr>
            <td>{{ $subcategory->id }}</td>
            <td>{{ $subcategory->name }}</td>
            <td>{{ $subcategory->category->name }}</td>
            <td>{{ $subcategory->itemsCount() }}</td>
            <td>{{ $subcategory->created_at->toFormattedDateString() }}</td>
            <td>
              <x-actions edit-route="{{ route('subcategories.edit', $subcategory->id) }}"
                delete-route="{{ route('subcategories.destroy', $subcategory->id) }}"
                id="{{ $subcategory->id }}" />
            </td>
          </tr>
        @endforeach
      </x-slot:tbody>
    </x-table>
    {{ $subcategories->links() }}
  </x-card>

  @push('scripts')
    @vite(['resources/js/app.js'])
  @endpush
</x-layout>
