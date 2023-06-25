<x-guest-layout>
    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <div class="auth-logo">
                    <a href="{{ route('login') }}"><img src="{{ asset('assets/images/bps.png') }}"
                            alt="Logo"></a>
                </div>
                <h1 class="auth-title">Login</h1>
                <p class="auth-subtitle mb-3">Masuk dengan data yang kamu inputkan pada saat proses pendaftaran.</p>
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                @endif
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input
                            class="form-control{{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }}"
                            type="text" name="login"
                            placeholder="Username..."value="{{ old('username') ?: old('email') }}" required
                            autofocus>
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                        @if ($errors->has('username') || $errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" class="form-control form-control" name="password" placeholder="Password..."
                            placeholder="Password">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-2">Login</button>
                </form>
                <div class="text-center mt-4 text-lg">
                    @if (Route::has('register'))
                        <p class="text-gray-600">Belum memiliki akun? <a href="{{ route('register') }}"
                                class="font-bold">Daftar
                                Sekarang</a></p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right">
            </div>
        </div>
    </div>
</x-guest-layout>
