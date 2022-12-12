<x-layout title="Items">
  <x-card title="Items List">
    <x-slot:action>
      <a href="{{ route('items.create') }}" class="btn btn-secondary">
        <i class="fas fa-plus-circle"></i>
        Add</a>
    </x-slot:action>

    <x-table>
      <x-slot:thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Status</th>
          <th>Subcategory</th>
          <th>Created</th>
          <th></th>
        </tr>
      </x-slot:thead>
      <x-slot:tbody>
        <x-empty-row :resources="$items" colspan="8" />
        @foreach ($items as $item)
          <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->price->formatted() }}</td>
            <td>{{ $item->quantity }} Qty</td>
            <td>
              <span
                class="badge badge-pill {{ $item->status->isInStock() ? 'badge-info' : 'badge-danger' }}">{{ strtoupper($item->status->value) }}</span>
            </td>
            <td>{{ $item->subcategory->name }}</td>
            <td>{{ $item->created_at->toFormattedDateString() }}</td>
            <td>
              <x-actions edit-route="{{ route('items.edit', $item->id) }}"
                delete-route="{{ route('items.destroy', $item->id) }}" id="{{ $item->id }}" />
            </td>
          </tr>
        @endforeach
      </x-slot:tbody>
    </x-table>
    {{ $items->links() }}
  </x-card>

  @push('scripts')
    @vite(['resources/js/app.js'])
  @endpush
</x-layout>
