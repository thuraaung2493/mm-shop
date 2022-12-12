<x-form.field :$id :$label>
  <select
    {{ $attributes->class(['form-control', 'custom-select', 'multiSelect' => $attributes->has('multiSelect')]) }}
    id="{{ $id }}" name="{{ $id }}" {{ $attributes }}>
    {{ $slot }}
  </select>
</x-form.field>
