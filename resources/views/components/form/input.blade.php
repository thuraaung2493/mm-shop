@props(['id', 'label' => '', 'type' => 'text', 'placeholder' => '', 'oldValue' => ''])

<x-form.field :$id :$label>
  <input id="{{ $id }}" type="{{ $type }}"
    class="form-control @error($id) is-invalid @enderror" name="{{ $id }}"
    {{ $attributes->merge(['value' => old($id, $oldValue)]) }} placeholder="{{ $placeholder }}"
    {{ $attributes }}>
</x-form.field>
