@props(['label', 'name'])
<div class="col-md-6 mb-4">
    <label>{{ $label }}</label>
    <fieldset class="form-group @error($name) is-invalid @enderror">
        <select name="{{ $name }}" class="form-select">
            <option selected disabled>Pilih</option>
            {{ $slot ?? '' }}
        </select>
    </fieldset>
    @error($name)
        <div class="invalid-feedback">
            <i class="bx bx-radio-circle"></i>
            {{ $message }}
        </div>
    @enderror
</div>
