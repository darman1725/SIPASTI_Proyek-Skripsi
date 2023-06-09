<x-app-layout>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="bi bi-info-circle-fill"></i> Tambah Berita Statistik</h1>
        <a href="{{ route('berita') }}" class="btn btn-secondary btn-icon-split">
            <span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
            <span class="text">Kembali</span>
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-plus"></i> Tambah Data Berita</h6>
        </div>

        <div class="card-body">
            <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data" id="save-form">
                @csrf

                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Judul</label>
                        <input type="text" name="judul" id="judul" class="form-control" placeholder="Silahkan isi judul berita..." required>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Kategori</label>
                        <select name="kategori" id="kategori" class="form-control" required>
                            <option value="">-- Pilih kategori kegiatan --</option>
                            <option value="Sosial dan Kependudukan">Sosial dan Kependudukan</option>
                            <option value="Ekonomi dan Perdagangan">Ekonomi dan Perdagangan</option>
                            <option value="Pertanian dan Pertambangan">Pertanian dan Pertambangan</option>
                            <option value="Pengumuman Resmi">Pengumuman Resmi</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Tanggal Publikasi</label>
                        <input type="date" name="tanggal_publikasi" id="tanggal_publikasi" class="form-control"
                            required>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">File</label><br>
                        <input type="file" name="file" id="file" class="form-control-file" required>
                    </div>

                    <div class="form-group col-md-12">
                        <label class="font-weight-bold">Isi</label>
                        <textarea name="isi" id="isi" rows="5" class="form-control" placeholder="Silahkan isi deskripsi berita..." required></textarea>
                    </div>
                </div>

                <div class="card-footer text-right">
                    <button type="button" class="btn btn-success" 
                    onclick="swalConfirmStore('{{ __('Apakah Anda yakin ingin menyimpan data berita ini?') }}', '{{ __('Data Berita berhasil disimpan') }}', '{{ route('berita') }}')">
                    <i class="fa fa-save"></i> Simpan</button>
                <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>