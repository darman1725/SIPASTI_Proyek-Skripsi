@props(['label', 'name', 'type', 'value'])
<div class="col-sm-6 mb-4">
    <label>{{ $label }}</label>
    <input name="{{ $name }}" type="{{ $type }}" class="form-control @error($name) is-invalid @enderror"
        placeholder="{{ $label }}" value="{{ $value }}">
    @error($name)
        <div class="invalid-feedback">
            <i class="bx bx-radio-circle"></i>
            {{ $message }}
        </div>
    @enderror
</div>
