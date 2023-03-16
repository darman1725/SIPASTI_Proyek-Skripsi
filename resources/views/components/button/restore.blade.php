@props(['action'])
<form method="post" class="d-inline" action="{{ $action }}">
    @csrf
    <button type="submit" class="btn icon btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Restore">
        <i class="bi bi-recycle"></i>
    </button>
</form>
