<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Data Pendaftaran Calon Petugas Statistik') }}</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="id_data_user">{{ __('Nama Pelamar') }}</label>
                            <p class="form-control">{{ $pendaftarans->user->nama_lengkap }}</p>
                        </div>
                        <div class="form-group">
                            <label for="id_data_kegiatan">{{ __('Kegiatan') }}</label>
                            <p class="form-control">{{ $pendaftarans->kegiatan->nama }}</p>
                        </div>
                        <div class="form-group">
                            <label for="provinsi">{{ __('Provinsi') }}</label>
                            <p class="form-control">{{ ucwords(strtolower($pendaftarans->provinsi)) }}</p>
                        </div>
                        <div class="form-group">
                            <label for="kabupaten_kota">{{ __('Kabupaten/Kota') }}</label>
                            <p class="form-control">{{ ucwords(strtolower($pendaftarans->kabupaten_kota)) }}</p>
                        </div>
                        <div class="form-group">
                            <label for="jabatan">{{ __('Jabatan') }}</label>
                            <p class="form-control">{{ $pendaftarans->jabatan }}</p>
                        </div>
                        <div class="form-group mb-0">
                            <a href="{{ route('pendaftaran', $pendaftarans->id) }}" class="btn btn-primary">{{
                                __('Kembali') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>