<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Detail Data Pelamar') }}</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="nik">{{ __('NIK') }}</label>
                            <input id="nik" type="text" class="form-control" name="nik" value="{{ $user->nik }}"
                                readonly>
                        </div>

                        <div class="form-group">
                            <label for="email">{{ __('Email') }}</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}"
                                readonly>
                        </div>

                        <div class="form-group">
                            <label for="nama_lengkap">{{ __('Nama Lengkap') }}</label>
                            <input id="nama_lengkap" type="text" class="form-control" name="nama_lengkap"
                                value="{{ $user->nama_lengkap }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="username">{{ __('Username') }}</label>
                            <input id="username" type="text" class="form-control" name="username"
                                value="{{ $user->username }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="level">{{ __('Level') }}</label>
                            <input id="level" type="text" class="form-control" name="level" value="{{ $user->level }}"
                                readonly>
                        </div>

                        <div class="form-group">
                            <a href="{{ route('user') }}" class="btn btn-primary">{{ __('Kembali') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>