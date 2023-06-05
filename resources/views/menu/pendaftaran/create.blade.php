<x-app-layout>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="bi bi-journal-bookmark-fill"></i> Form Pendaftaran Calon Petugas
            Statistik</h1>
        <a href="{{ route('kegiatan') }}" class="btn btn-secondary btn-icon-split">
            <span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
            <span class="text">Kembali</span>
        </a>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-plus"></i> Tambah Data Pendaftaran</h6>
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('pendaftaran.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_data_user">{{ __('Nama Pelamar') }}</label>
                            <input id="id_data_user" type="hidden" class="form-control" name="id_data_user" readonly
                                value="{{ Auth::user()->id }}">
                            <p class="form-control">{{ Auth::user()->nama_lengkap }}</p>
                        </div>

                        <div class="form-group">
                            <label for="id_data_kegiatan" class="font-weight-bold">{{ __('Pilih Kegiatan') }}</label>
                            <select id="id_data_kegiatan"
                                class="form-control @error('id_data_kegiatan') is-invalid @enderror"
                                name="id_data_kegiatan" required>
                                <option value="{{ $selectedKegiatan->id }}">{{ $selectedKegiatan->nama }} - {{
                                    $selectedKegiatan->jenis }}</option>
                            </select>
                        </div>

                        <span class="badge bg-light text-success border border-success">
                            Untuk data provinsi, kabupaten/kota, kecamatan, dan <br>
                            alamat lengkap isi sesuai lokasi keberadaan Anda sekarang
                          </span>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="provinsi" class="font-weight-bold">{{ __('Provinsi') }}</label>
                            <select class="form-control" id="provinsi" name="provinsi">
                                <option value="">-- Pilih Provinsi --</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="kabupaten_kota" class="font-weight-bold">{{ __('Kabupaten/Kota') }}</label>
                            <select class="form-control" id="kabupaten_kota" name="kabupaten_kota">
                                <option value="">-- Pilih Kabupaten/Kota --</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="kecamatan" class="font-weight-bold">{{ __('Kecamatan') }}</label>
                            <select class="form-control" id="kecamatan" name="kecamatan">
                                <option value="">-- Pilih Kecamatan --</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="alamat_lengkap" class="font-weight-bold">{{ __('Alamat lengkap') }}</label>
                    <textarea id="alamat_lengkap" class="form-control" name="alamat_lengkap" rows="4" cols="50"
                        placeholder="Silahkan masukkan alamat lengkap anda...">{{ old('alamat_lengkap') }}</textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                    <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Fetch provinces and populate select dropdown
        fetch(`https://darman1725.github.io/api-wilayah-indonesia/api/provinces.json`)
            .then((response) => response.json())
            .then((provinces) => {
                var data = provinces;
                var tampung = `<option>-- Pilih Provinsi --</option>`;
                data.forEach((element) => {
                    tampung += `<option data-prov="${element.id}" value="${element.name}">${element.name}</option>`;
                });
                document.getElementById("provinsi").innerHTML = tampung;
            });
    </script>

    <script>
        // Event listener for province select dropdown
        const selectProvinsi = document.getElementById('provinsi');
        const selectKota = document.getElementById('kabupaten_kota');
        const selectKecamatan = document.getElementById('kecamatan');

        selectProvinsi.addEventListener('change', (e) => {
            var provinsi = e.target.options[e.target.selectedIndex].dataset.prov;
            fetch(`https://darman1725.github.io/api-wilayah-indonesia/api/regencies/${provinsi}.json`)
                .then((response) => response.json())
                .then((regencies) => {
                    var data = regencies;
                    var tampung = `<option>-- Pilih Kabupaten/Kota --</option>`;
                    document.getElementById('kabupaten_kota').innerHTML = '<option>Pilih</option>';
                    data.forEach((element) => {
                        tampung += `<option data-prov="${element.id}" value="${element.name}">${element.name}</option>`;
                    });
                    document.getElementById("kabupaten_kota").innerHTML = tampung;
                });
        });

        // Event listener for city/regency select dropdown
        selectKota.addEventListener('change', (e) => {
            var kota = e.target.options[e.target.selectedIndex].dataset.prov;
            fetch(`https://darman1725.github.io/api-wilayah-indonesia/api/districts/${kota}.json`)
                .then((response) => response.json())
                .then((districts) => {
                    var data = districts;
                    var tampung = `<option>-- Pilih Kecamatan --</option>`;
                    document.getElementById('kecamatan').innerHTML = '<option>Pilih</option>';
                    data.forEach((element) => {
                        tampung += `<option data-prov="${element.id}" value="${element.name}">${element.name}</option>`;
                    });
                    document.getElementById("kecamatan").innerHTML = tampung;
                });
        });
    </script>
</x-app-layout>