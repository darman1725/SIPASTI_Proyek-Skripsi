@props(['label', 'name', 'type', 'value'])
<div class="col-sm-12 mb-4">
    <label>{{ $label }}</label>
    <textarea rows="6" name="{{ $name }}" type="{{ $type }}"
        class="form-control @error($name) is-invalid @enderror" placeholder="{{ $label }}">{{ $value }}</textarea>
    @error($name)
        <div class="invalid-feedback">
            <i class="bx bx-radio-circle"></i>
            {{ $message }}
        </div>
    @enderror
</div>
