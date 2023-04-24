<x-app-layout>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Data Pendaftaran Calon Petugas Statistik') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('pendaftaran.update', $pendaftaran->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="id_data_user">{{ __('Nama Pelamar') }}</label>
                                <input id="id_data_user" type="hidden" class="form-control" name="id_data_user" readonly
                                    value="{{ Auth::user()->id }}">
                                <p class="form-control">{{ Auth::user()->nama_lengkap }}</p>
                            </div>
                            <div class="form-group">
                                <label for="id_data_kegiatan">{{ __('Pilih Kegiatan') }}</label>
                                <select id="id_data_kegiatan"
                                    class="form-control @error('id_data_kegiatan') is-invalid @enderror"
                                    name="id_data_kegiatan" required>
                                    <option value="" disabled>-- Pilih Data Kegiatan --</option>
                                    @foreach($kegiatans as $kg)
                                    <option value="{{ $kg->id }}" {{ $kg->id == $pendaftaran->id_data_kegiatan ? 'selected' : '' }}>{{ $kg->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="provinsi">{{ __('Provinsi') }}</label>
                                <input id="provinsi" type="text" class="form-control" name="provinsi" required value="{{ $pendaftaran->provinsi }}">
                            </div>
                            <div class="form-group">
                                <label for="kabupaten_kota">{{ __('Kabupaten/Kota') }}</label>
                                <input id="kabupaten_kota" type="text" class="form-control" name="kabupaten_kota"
                                    required value="{{ $pendaftaran->kabupaten_kota }}">
                            </div>
                            <div class="form-group">
                                <label for="jabatan">{{ __('Jabatan') }}</label>
                                <input id="jabatan" type="text" class="form-control" name="jabatan" required value="{{ $pendaftaran->jabatan }}">
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
