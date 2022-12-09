<div>
  <a class="btn btn-primary" href="{{ $editRoute }}">Edit</a>
  <a class="btn btn-danger deleteBtn" data-id="{{ $id }}"
    href="{{ $deleteRoute }}">Delete</a>
  <form id="delete-form-{{ $id }}" action="{{ $deleteRoute }}" method="POST" class="d-none">
    @csrf
    @method('DELETE')
  </form>
</div>
