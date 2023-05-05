<x-app-layout>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Step 1</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('step1') }}">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input id="nama" type="text" class="form-control @if($errors->has('nama')) is-invalid @endif"
                            name="nama" value="{{ old('nama') }}" required autofocus>
                        @if($errors->has('nama'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('nama') }}</strong>
                        </span>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Next
                    </button>
                </form>
            </div>
        </div>
    </section>
</x-app-layout>