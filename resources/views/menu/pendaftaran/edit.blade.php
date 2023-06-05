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

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="bi bi-ui-checks-grid"></i> Edit Pendaftaran</h1>
    <a href="{{ route('pendaftaran') }}" class="btn btn-secondary btn-icon-split">
      <span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
      <span class="text">Kembali</span>
    </a>
  </div>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card shadow">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-edit"></i> Form Edit Pendaftaran Calon
              Petugas Statistik</h6>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('pendaftaran.update', $pendaftaran->id) }}">
              @csrf
              @method('PUT')

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="font-weight-bold">Nama Pelamar</label>
                    <input id="id_data_user" type="hidden" class="form-control" name="id_data_user" readonly
                      value="{{ Auth::user()->id }}">
                    <p class="form-control">{{ Auth::user()->nama_lengkap }}</p>
                  </div>

                  <div class="form-group">
                    <label class="font-weight-bold">Pilih Kegiatan</label>
                    <select id="id_data_kegiatan" class="form-control @error('id_data_kegiatan') is-invalid @enderror"
                      name="id_data_kegiatan" required>
                      <option value="" disabled>-- Pilih Data Kegiatan --</option>
                      @foreach($kegiatans as $kg)
                      <option value="{{ $kg->id }}" {{ $pendaftaran->id_data_kegiatan == $kg->id ? 'selected' : '' }}>{{
                        $kg->nama }} - {{ $kg->jenis }}</option>
                      @endforeach
                    </select>
                  </div>

                    <span class="badge bg-light text-success border border-success">
                      Untuk data provinsi, kabupaten/kota, kecamatan, dan <br>
                      alamat lengkap isi sesuai lokasi keberadaan Anda sekarang
                    </span>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label class="font-weight-bold">Provinsi</label>
                    <select class="form-control" id="provinsi" name="provinsi" data-prov="provinsi">
                      <option value="">-- Pilih Provinsi --</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label class="font-weight-bold">Kabupaten/Kota</label>
                    <select class="form-control" id="kabupaten_kota" name="kabupaten_kota">
                      <option>{{ $pendaftaran->kabupaten_kota }}</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label class="font-weight-bold">Kecamatan</label>
                    <select class="form-control" id="kecamatan" name="kecamatan">
                      <option>{{ $pendaftaran->kecamatan }}</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="font-weight-bold">Alamat lengkap</label>
                <textarea id="alamat_lengkap" class="form-control" name="alamat_lengkap" rows="4" cols="50"
                  placeholder="Silahkan masukkan alamat lengkap anda...">{{ $pendaftaran->alamat_lengkap }}</textarea>
              </div>

              <div class="form-group mb-0">
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    fetch(`https://darman1725.github.io/api-wilayah-indonesia/api/provinces.json`)
        .then((response) => response.json())
        .then((provinces) => {
            var data = provinces;
            var tampung = `<option>{{ $pendaftaran->provinsi }}</option>`;
            data.forEach((element) => {
                tampung += `<option data-prov="${element.id}" value="${element.name}">${element.name}</option>`;
            });
            document.getElementById("provinsi").innerHTML = tampung;
        });

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
            document.getElementById('kabupaten_kota').innerHTML = '<option value="">-- Pilih Kabupaten/Kota --</option>'; // set nilai default pada opsi Kabupaten/Kota
            document.getElementById('kecamatan').innerHTML = '<option value="">-- Pilih Kecamatan --</option>'; // set nilai default pada opsi Kecamatan
            data.forEach((element) => {
                tampung += `<option data-prov="${element.id}" value="${element.name}">${element.name}</option>`;
            });
            document.getElementById("kabupaten_kota").innerHTML = tampung;
        });
});


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

    selectKecamatan.addEventListener('change', (e) => {
            var kecamatan = e.target.options[e.target.selectedIndex].dataset.prov;
            fetch(`https://darman1725.github.io/api-wilayah-indonesia/api/villages/${kecamatan}.json`)
                .then((response) => response.json())
                .then((villages) => {
                    var data = villages;
                    var tampung = `<option>Pilih</option>`;
                    document.getElementById('kelurahan').innerHTML = '<option>Pilih</option>';
                    data.forEach((element) => {
                        tampung += `<option data-prov="${element.id}" value="${element.name}">${element.name}</option>`;
                    });
                    document.getElementById("kelurahan").innerHTML = tampung;
                });
    });
  </script>

</x-app-layout>