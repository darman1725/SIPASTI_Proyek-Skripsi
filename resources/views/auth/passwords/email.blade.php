<x-guest-layout>
    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <div class="auth-logo">
                    <a href="{{ route('login') }}"><img src="{{ Vite::asset('resources/images/logo/logo.svg') }}"
                            alt="Logo"></a>
                </div>
                <h1 class="auth-title">{{ __('Reset Password') }}</h1>
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
                <p>Email Address</p>
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input class="form-control form-control" type="email" name="email" placeholder="Email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                    <button
                        class="btn btn-primary btn-block btn-lg shadow-lg mt-4">{{ __('Send Password Reset Link') }}</button>
                </form>
                <div class="text-center mt-4 text-lg">
                    @if (Route::has('login'))
                        <p class="text-gray-600">Login again? <a href="{{ route('login') }}" class="font-bold">Log
                                in</a>.</p>
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
