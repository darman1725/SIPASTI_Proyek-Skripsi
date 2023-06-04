<x-app-layout>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="bi bi-ui-checks-grid"></i> Tambah Kegiatan</h1>
        <a href="{{ route('kegiatan') }}" class="btn btn-secondary btn-icon-split">
            <span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
            <span class="text">Kembali</span>
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-plus"></i> Tambah Data Kegiatan</h6>
        </div>

        <form method="POST" action="{{ route('kegiatan.store') }}" enctype="multipart/form-data" id="save-form">
            @csrf

            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control"
                            placeholder="Masukkan nama kegiatan..." value="{{ old('nama') }}" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Jenis</label>
                        <select name="jenis" id="jenis" class="form-control" required>
                            <option value="">-- Pilih Jenis --</option>
                            <option value="Lapangan">Lapangan</option>
                            <option value="Pengolahan">Pengolahan</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Level</label>
                        <select name="level" id="level" class="form-control" required>
                            <option value="">-- Pilih Level --</option>
                            <option value="Umum">Umum</option>
                            <option value="Provinsi">Provinsi</option>
                            <option value="Kabupaten/Kota">Kabupaten/Kota</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Gambar</label><br>
                        <input type="file" name="gambar" id="gambar" class="form-control-file" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control"
                            value="{{ old('tanggal_mulai') }}" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Tanggal Selesai</label>
                        <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control"
                            value="{{ old('tanggal_selesai') }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Deskripsi Kegiatan</label>
                    <textarea name="detail_kegiatan" id="detail_kegiatan" class="form-control"
                        placeholder="Silahkan isi deskripsi kegiatan..." rows="4"
                        required>{{ old('detail_kegiatan') }}</textarea>
                </div>
            </div>

            <div class="card-footer text-right">
                <button type="button" class="btn btn-success" 
                    onclick="swalConfirmStore('{{ __('Apakah Anda yakin ingin menyimpan data kegiatan ini?') }}', '{{ __('Data Kegiatan Berhasil Disimpan') }}', '{{ route('kegiatan') }}')">
                    <i class="fa fa-save"></i> Simpan</button>
                <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
            </div>
        </form>
    </div>
</x-app-layout>