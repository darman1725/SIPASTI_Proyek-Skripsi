<x-app-layout>

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Edit Kegiatan</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('kegiatan.update', $kegiatan->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" value="{{ $kegiatan->nama }}" required>
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control" style="height: 150px;" required>{{ $kegiatan->deskripsi }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <div class="mb-3">
                                    @if($kegiatan->gambar)
                                        <img src="{{ asset('storage/kegiatan/'.$kegiatan->gambar) }}" class="img-fluid img-preview" style="width: 200px; margin-top: 10px;">
                                        <div class="mt-1">{{ $kegiatan->gambar }}</div>
                                    @else
                                        <div>Tidak ada gambar yang diunggah</div>
                                    @endif
                                </div>
                                <input type="file" name="gambar" id="gambar" class="form-control-file">
                            </div>

                            <div class="form-group">
                                <label for="tanggal_mulai">Tanggal Mulai</label>
                                <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control" value="{{ $kegiatan->tanggal_mulai }}" required>
                            </div>

                            <div class="form-group">
                                <label for="tanggal_selesai">Tanggal Selesai</label>
                                <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control" value="{{ $kegiatan->tanggal_selesai }}" required>
                            </div>

                            <div class="form-group">
                                <label for="kuota">Kuota</label>
                                <input type="number" name="kuota" id="kuota" class="form-control" value="{{ $kegiatan->kuota }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('kegiatan.index') }}" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
