<x-app-layout>
    
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Tambah Kegiatan</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('kegiatan.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="jenis">Jenis</label>
                                <select name="jenis" id="jenis" class="form-control" required>
                                    <option value="">-- Pilih Jenis --</option>
                                    <option value="Lapangan">Lapangan</option>
                                    <option value="Pengolahan">Pengolahan</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="level">Level</label>
                                <select name="level" id="level" class="form-control" required>
                                    <option value="">-- Pilih Level --</option>
                                    <option value="Umum">Umum</option>
                                    <option value="Provinsi">Provinsi</option>
                                    <option value="Kabupaten/Kota">Kabupaten/Kota</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="gambar">Gambar</label><br>
                                <input type="file" name="gambar" id="gambar" class="form-control-file" required><br>
                            </div>

                            <div class="form-group">
                                <label for="tanggal_mulai">Tanggal Mulai</label>
                                <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control"
                                    value="{{ old('tanggal_mulai') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="tanggal_selesai">Tanggal Selesai</label>
                                <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control"
                                    value="{{ old('tanggal_selesai') }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('kegiatan') }}" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>