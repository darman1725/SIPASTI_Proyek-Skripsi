<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Data Pelamar') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('user.update', $user->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nik">{{ __('NIK') }}</label>
                                <input id="nik" type="text"
                                    class="form-control{{ $errors->has('nik') ? ' is-invalid' : '' }}" name="nik"
                                    value="{{ $user->nik }}" required autocomplete="nik" autofocus>
                            </div>

                            <div class="form-group">
                                <label for="email">{{ __('Email') }}</label>
                                <input id="email" type="email"
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                    value="{{ $user->email }}" required autocomplete="email" readonly>
                            </div>

                            <div class="form-group">
                                <label for="nama_lengkap">{{ __('Nama Lengkap') }}</label>
                                <input id="nama_lengkap" type="text"
                                    class="form-control{{ $errors->has('nama_lengkap') ? ' is-invalid' : '' }}"
                                    name="nama_lengkap" value="{{ $user->nama_lengkap }}" required
                                    autocomplete="nama_lengkap">
                            </div>

                            <div class="form-group">
                                <label for="username">{{ __('Username') }}</label>
                                <input id="username" type="text"
                                    class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                    name="username" value="{{ $user->username }}" required autocomplete="username"
                                    readonly>
                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password"
                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    name="password" autocomplete="new-password">
                            </div>

                            <div class="form-group">
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" autocomplete="new-password">
                            </div>

                            <div class="form-group">
                                <label for="level">{{ __('Level') }}</label>
                                <input id="level" type="text"
                                    class="form-control{{ $errors->has('level') ? ' is-invalid' : '' }}" name="level"
                                    value="{{ $user->level }}" required autocomplete="level">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>