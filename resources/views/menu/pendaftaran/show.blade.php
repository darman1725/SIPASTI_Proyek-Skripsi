<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary">
                            <i class="fas fa-fw fa-user"></i> Data Pendaftaran Calon Petugas Statistik
                        </h6>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label class="font-weight-bold">Nama Pelamar</label>
                            <p class="form-control">{{ $pendaftarans->user->nama_lengkap }}</p>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Kegiatan</label>
                            <p class="form-control">{{ $pendaftarans->kegiatan->nama }} - {{
                                $pendaftarans->kegiatan->jenis }}</p>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Provinsi</label>
                            <p class="form-control">{{ ucwords(strtolower($pendaftarans->provinsi)) }}</p>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Kabupaten/Kota</label>
                            <p class="form-control">{{ ucwords(strtolower($pendaftarans->kabupaten_kota)) }}</p>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Kecamatan</label>
                            <p class="form-control">{{ ucwords(strtolower($pendaftarans->kecamatan)) }}</p>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Alamat Lengkap</label>
                            <p class="form-control">{{ $pendaftarans->alamat_lengkap }}</p>
                        </div>
                        <div class="form-group mb-0">
                            <a href="{{ route('pendaftaran', $pendaftarans->id) }}"
                                class="btn btn-secondary btn-icon-split">
                                <span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
                                <span class="text">Kembali</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>