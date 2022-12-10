<x-layout title="Dashboard">
  <div class="row">
    <x-box title="All Users" count="{{ $usersCount }}" type="primary">
      <i class="fas fa-users fa-2x text-gray-300"></i>
    </x-box>
    <x-box title="Categories" count="{{ $categoriesCount }}" type="success">
      <i class="fas fa-tags fa-2x text-gray-300"></i>
    </x-box>
    <x-box title="Subcategories" count="{{ $subcategoriesCount }}" type="info">
      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
    </x-box>
    <x-box title="Items List" count="{{ $itemsCount }}" type="primary">
      <i class="fas fa-cart-plus fa-2x text-gray-300"></i>
    </x-box>
  </div>
</x-layout>
