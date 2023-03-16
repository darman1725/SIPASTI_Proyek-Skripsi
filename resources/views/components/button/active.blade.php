@props(['action'])
<form method="post" class="d-inline" action="{{ $action }}">
    @method('put')
    @csrf
    <button type="submit" class="btn icon btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Activate">
        <i class="bi bi-check-circle-fill"></i>
    </button>
</form>
