@props(['action'])
<form method="post" class="d-inline" action="{{ $action }}">
    @method('delete')
    @csrf
    <button type="submit" class="btn icon btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
        <i class="bi bi-trash-fill"></i>
    </button>
</form>
