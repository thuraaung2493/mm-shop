<button type="submit" class="btn btn-primary">
  {{ $slot->isNotEmpty() ? $slot : 'Create' }}
</button>
