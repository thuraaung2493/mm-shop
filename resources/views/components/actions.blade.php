<div>
  <a class="btn btn-primary" href="{{ $editRoute }}"><i class="fas fa-edit"></i></a>
  <a class="btn btn-danger deleteBtn" data-id="{{ $id }}" href="{{ $deleteRoute }}"><i
      class="fas fa-trash-alt"></i></a>
  <form id="delete-form-{{ $id }}" action="{{ $deleteRoute }}" method="POST"
    class="d-none">
    @csrf
    @method('DELETE')
  </form>
</div>
