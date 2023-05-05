<x-app-layout>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Step 3</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('step3') }}">
                    @csrf
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input id="address" type="text"
                            class="form-control @if($errors->has('address')) is-invalid @endif" name="address"
                            value="{{ old('address') }}" required autofocus>
                        @if($errors->has('address'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </section>
</x-app-layout>