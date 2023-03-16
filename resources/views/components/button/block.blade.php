@props(['action'])
<form method="post" class="d-inline" action="{{ $action }}">
    @method('put')
    @csrf
    <button type="submit" class="btn icon btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Block">
        <i class="bi bi-x-circle-fill"></i>
    </button>
</form>
