@props(['label', 'name', 'type', 'value'])
<div class="col-sm-12 mb-4">
    <label>{{ $label }}</label>
    <textarea id="editor" rows="6" name="{{ $name }}" type="{{ $type }}"
        class="form-control @error($name) is-invalid @enderror" placeholder="{{ $label }}">{{ $value }}</textarea>
    @error($name)
        <div class="invalid-feedback">
            <i class="bx bx-radio-circle"></i>
            {{ $message }}
        </div>
    @enderror
</div>

<script src="{{ Vite::asset('resources/js/ckeditor.js') }}"></script>
<script src="{{ Vite::asset('resources/js/config-ckeditor.js') }}"></script>
<link rel="stylesheet" href="{{ Vite::asset('resources/css/ckeditor.css') }}">
