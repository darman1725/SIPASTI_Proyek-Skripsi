<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Tambah Data Pelamar') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('user.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="nik">{{ __('NIK') }}</label>
                                <input id="nik" type="text"
                                    class="form-control{{ $errors->has('nik') ? ' is-invalid' : '' }}" name="nik"
                                    value="{{ old('nik') }}" required autocomplete="nik" autofocus>
                            </div>

                            <div class="form-group">
                                <label for="email">{{ __('Email') }}</label>
                                <input id="email" type="email"
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                    value="{{ old('email') }}" required autocomplete="email">
                            </div>

                            <div class="form-group">
                                <label for="nama_lengkap">{{ __('Nama Lengkap') }}</label>
                                <input id="nama_lengkap" type="text"
                                    class="form-control{{ $errors->has('nama_lengkap') ? ' is-invalid' : '' }}"
                                    name="nama_lengkap" value="{{ old('nama_lengkap') }}" required
                                    autocomplete="nama_lengkap">
                            </div>

                            <div class="form-group">
                                <label for="username">{{ __('Username') }}</label>
                                <input id="username" type="text"
                                    class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                    name="username" value="{{ old('username') }}" required autocomplete="username">
                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password"
                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    name="password" required autocomplete="new-password">
                            </div>

                            <div class="form-group">
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>

                            <div class="form-group">
                                <label for="level">{{ __('Level') }}</label>
                                <input id="level" type="text"
                                    class="form-control{{ $errors->has('level') ? ' is-invalid' : '' }}" name="level"
                                    value="{{ old('level') ?? 'user' }}" autocomplete="level" readonly>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>