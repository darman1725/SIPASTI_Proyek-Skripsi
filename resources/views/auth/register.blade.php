<x-guest-layout>
    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <div class="auth-logo">
                    <a href="{{ route('login') }}"><img src="{{ asset('assets/images/bps.png') }}" alt="Logo"></a>
                </div>
                <h1 class="auth-title">Register</h1>
                <p class="auth-subtitle mb-3">Inputkan isian kolom sesuai dengan data yang anda miliki untuk melengkapi
                    proses pendaftaran.</p>
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
                <form action="" method="POST">
                    @csrf
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="number" class="form-control form-control" name="nik" placeholder="Data NIK..."
                            value="{{ old('nik') }}" required>
                        <div class="form-control-icon">
                            <i class="bi bi-123"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="email" class="form-control form-control" name="email" placeholder="Email..."
                            value="{{ old('email') }}" required>
                        <div class="form-control-icon">
                            <i class="bi bi-envelope"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text" class="form-control form-control" name="nama_lengkap"
                            placeholder="Nama Lengkap..." value="{{ old('nama_lengkap') }}" required>
                        <div class="form-control-icon">
                            <i class="bi bi-person-lines-fill"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text" class="form-control form-control" name="username"
                            placeholder="Username..." value="{{ old('username') }}" required>
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" class="form-control form-control" name="password"
                            placeholder="Password..." required>
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" class="form-control form-control" name="password_confirmation"
                            placeholder="Confirm Password..." required>
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-2">Sign Up</button>
                </form>
                <div class="text-center mt-5 text-sm">
                    <p class='text-gray-600'>Sudah memiliki akun? <a href="{{ route('login') }}"
                            class="font-bold">Login</a></p>
                </div>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right">
            </div>
        </div>
    </div>
</x-guest-layout>
