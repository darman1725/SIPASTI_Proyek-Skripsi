@props(['label', 'name', 'value'])
<div class="col-sm-6 mb-4 ">
    <label class="d-block">{{ $label }}</label>
    @if ($value == null)
        <img id="frame" src="{{ Vite::asset('public/images/faces/1.jpg') }}" style="max-height:200px; max-width:200px;"
            alt="avatar">
    @else
        <img id="frame" src="{{ url('storage/avatar/' . $value) }}" style="max-height:200px; max-width:200px;"
            alt="avatar">
    @endif
    <input name="{{ $name }}" class="form-control mt-3 @error($name) is-invalid @enderror" type="file"
        id="formFile" onchange="preview()">
    @error($name)
        <div class="invalid-feedback">
            <i class="bx bx-radio-circle"></i>
            {{ $message }}
        </div>
    @enderror
</div>

@push('scripts')
    <script>
        function preview() {
            frame.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endpush
