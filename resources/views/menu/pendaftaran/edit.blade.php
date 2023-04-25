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
          <div class="card-header">{{ __('Form Edit Pendaftaran Calon Petugas Statistik') }}</div>

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
                <select id="id_data_kegiatan" class="form-control @error('id_data_kegiatan') is-invalid @enderror"
                  name="id_data_kegiatan" required>
                  <option value="" disabled>-- Pilih Data Kegiatan --</option>
                  @foreach($kegiatans as $kg)
                  <option value="{{ $kg->id }}" @if($pendaftaran->id_data_kegiatan == $kg->id)
                    selected @endif>{{ $kg->nama }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="provinsi">{{ __('Provinsi') }}</label>
                <select class="form-control" id="provinsi" name="provinsi" data-prov="provinsi">
                  <option value="">-- Pilih Provinsi --</option>
                </select>
              </div>
              <div class="form-group">
                <label for="kabupaten_kota">{{ __('Kabupaten/Kota') }}</label>
                <select class="form-control" id="kabupaten_kota" name="kabupaten_kota">
                  <option>{{ ($pendaftaran->kabupaten_kota) }}</option>
                </select>
              </div>
              <div class="form-group">
                <label for="jabatan">{{ __('Jabatan') }}</label>
                <select class="form-control" name="jabatan" required>
                  <option value="" disabled selected>-- Pilih Jabatan --</option>
                  <option value="PML" @if($pendaftaran->jabatan == 'PML') selected @endif>PML</option>
                  <option value="PPL" @if($pendaftaran->jabatan == 'PPL') selected @endif>PPL</option>
                  <option value="Koseka" @if($pendaftaran->jabatan == 'Koseka') selected @endif>Koseka
                  </option>
                </select>
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

  <script>
    fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/provinces.json`)
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

    selectProvinsi.addEventListener('change', (e) => {
        var provinsi = e.target.options[e.target.selectedIndex].dataset.prov;
        fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/regencies/${provinsi}.json`)
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

    selectKota.addEventListener('change', (e) => {
        var kota = e.target.options[e.target.selectedIndex].dataset.prov;
        fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/districts/${kota}.json`)
            .then((response) => response.json())
            .then((districts) => {
                var data = districts;
                var tampung = `<option>-- Pilih Kabupaten/Kota --</option>`;
                document.getElementById('kecamatan').innerHTML = '<option>Pilih</option>';
                data.forEach((element) => {
                    tampung += `<option data-prov="${element.id}" value="${element.name}">${element.name}</option>`;
                });
                document.getElementById("kecamatan").innerHTML = tampung;
            });
    });
  </script>

</x-app-layout>