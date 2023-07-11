<x-app-layout>
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-9">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-plus"></i> Tambah Data
                            Pengguna</h6>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('user.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="nik" class="font-weight-bold">NIK</label>
                                <input id="nik" type="text"
                                    class="form-control{{ $errors->has('nik') ? ' is-invalid' : '' }}" name="nik"
                                    value="{{ old('nik') }}" required autocomplete="nik" autofocus
                                    placeholder="Silahkan isi NIK pengguna...">
                            </div>

                            <div class="form-group">
                                <label for="email" class="font-weight-bold">Email</label>
                                <input id="email" type="email"
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                    value="{{ old('email') }}" required autocomplete="email"
                                    placeholder="Silahkan isi email pengguna...">
                            </div>

                            <div class="form-group">
                                <label for="nama_lengkap" class="font-weight-bold">Nama Lengkap</label>
                                <input id="nama_lengkap" type="text"
                                    class="form-control{{ $errors->has('nama_lengkap') ? ' is-invalid' : '' }}"
                                    name="nama_lengkap" value="{{ old('nama_lengkap') }}" required
                                    autocomplete="nama_lengkap" placeholder="Silahkan isi nama lengkap pengguna...">
                            </div>

                            <div class="form-group">
                                <label for="username" class="font-weight-bold">Username</label>
                                <input id="username" type="text"
                                    class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                    name="username" value="{{ old('username') }}" required autocomplete="username"
                                    placeholder="Silahkan isi username pengguna...">
                            </div>

                            <div class="form-group">
                                <label for="password" class="font-weight-bold">Password</label>
                                <input id="password" type="password"
                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    name="password" required autocomplete="new-password"
                                    placeholder="Silahkan isi password pengguna...">
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="font-weight-bold">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password"
                                    placeholder="Silahkan isi ulang password pengguna...">
                                    @error('password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                            </div>

                            <div class="form-group">
                                <label for="level" class="font-weight-bold">Level</label>
                                <select id="level" class="form-control{{ $errors->has('level') ? ' is-invalid' : '' }}"
                                    name="level" readonly>
                                    <option value="">-- Pilih jenis pengguna --</option>
                                    <option value="user" {{ old('level')=='user' ? 'selected' : '' }}>User</option>
                                    <option value="admin" {{ old('level')=='admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                            </div>

                            <div class="form-group text-right">
                                <a href="{{ route('user') }}" class="btn btn-secondary"> <i
                                        class="fas fa-arrow-left"></i> Kembali</a>
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
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