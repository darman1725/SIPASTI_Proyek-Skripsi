<x-app-layout>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Step 2</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('step2') }}">
                    @csrf
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input id="phone" type="text" class="form-control @if($errors->has('phone')) is-invalid @endif"
                            name="phone" value="{{ old('phone') }}" required autofocus>
                        @if($errors->has('phone'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('phone') }}</strong>
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