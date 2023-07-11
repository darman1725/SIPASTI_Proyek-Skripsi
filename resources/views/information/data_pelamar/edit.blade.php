<x-app-layout>
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-9">
                <div class="card shadow">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-edit"></i> Edit Data
                            Pengguna</h6>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('user.update', $user->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nik" class="font-weight-bold">NIK</label>
                                <input type="text" name="nik" id="nik" value="{{ $user->nik }}"
                                    class="form-control @error('nik') is-invalid @enderror"
                                    placeholder="Silahkan isi nik pengguna...">
                                @error('nik')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nama_lengkap" class="font-weight-bold">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" id="nama_lengkap"
                                    value="{{ $user->nama_lengkap }}"
                                    class="form-control @error('nama_lengkap') is-invalid @enderror"
                                    placeholder="Silahkan isi nama lengkap pengguna...">
                                @error('nama_lengkap')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="username" class="font-weight-bold">Username</label>
                                <input type="text" name="username" id="username" value="{{ $user->username }}"
                                    class="form-control @error('username') is-invalid @enderror"
                                    placeholder="Silahkan isi username pengguna...">
                                @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email" class="font-weight-bold">Email</label>
                                <input type="email" name="email" id="email" value="{{ $user->email }}"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Silahkan isi email pengguna...">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password" class="font-weight-bold">Password</label>
                                <input type="password" name="password" id="password"
                                    value="{{ old('password', 'default_password') }}"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Silahkan isi password pengguna...">
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation" class="font-weight-bold">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    value="{{ old('password_confirmation', 'default_password') }}" class="form-control"
                                    placeholder="Silahkan isi ulang password pengguna...">
                            </div>

                            <div class="form-group text-right">
                                <a href="{{ route('user') }}" class="btn btn-secondary"><i
                                        class="fas fa-arrow-left"></i> Kembali</a>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <!-- Empty div to extend white box to the right -->
            </div>
        </div>
    </div>
</x-app-layout>