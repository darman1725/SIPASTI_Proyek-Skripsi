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
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Edit Kegiatan</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('kegiatan.update', $kegiatan->id) }}"
                            enctype="multipart/form-data" id="update-form">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control"
                                    value="{{ $kegiatan->nama }}" required>
                            </div>

                            <div class="form-group">
                                <label for="jenis">Jenis</label>
                                <select name="jenis" id="jenis" class="form-control" required>
                                    <option value="">-- Pilih Jenis --</option>
                                    <option value="Lapangan" {{ $kegiatan->jenis == 'Lapangan' ? 'selected' : '' }}>
                                        Lapangan</option>
                                    <option value="Pengolahan"
                                        {{ $kegiatan->jenis == 'Pengolahan' ? 'selected' : '' }}>Pengolahan</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="level">Level</label>
                                <select name="level" id="level" class="form-control" required>
                                    <option value="">-- Pilih Level --</option>
                                    <option value="Umum" {{ $kegiatan->level == 'Umum' ? 'selected' : '' }}>Umum
                                    </option>
                                    <option value="Provinsi" {{ $kegiatan->level == 'Provinsi' ? 'selected' : '' }}>
                                        Provinsi</option>
                                    <option value="Kabupaten/Kota"
                                        {{ $kegiatan->level == 'Kabupaten/Kota' ? 'selected' : '' }}>Kabupaten/Kota
                                    </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <div class="mb-3">
                                    @if($kegiatan->gambar)
                                    <img src="{{ asset('storage/kegiatan/'.$kegiatan->gambar) }}"
                                        class="img-fluid img-preview" style="width: 200px; margin-top: 10px;">
                                    <div class="mt-1">{{ $kegiatan->gambar }}</div>
                                    @else
                                    <div>Tidak ada gambar yang diunggah</div>
                                    @endif
                                </div>
                                <input type="file" name="gambar" id="gambar" class="form-control-file">
                            </div>

                            <div class="form-group">
                                <label for="tanggal_mulai">Tanggal Mulai</label>
                                <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control"
                                    value="{{ $kegiatan->tanggal_mulai }}" required>
                            </div>

                            <div class="form-group">
                                <label for="tanggal_selesai">Tanggal Selesai</label>
                                <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control"
                                    value="{{ $kegiatan->tanggal_selesai }}" required>
                            </div>

                            <button type="button" class="btn btn-primary"
                                onclick="swalConfirmUpdate('Apakah Anda yakin ingin mengupdate data kegiatan ini?', 'Data kegiatan berhasil diupdate', '{{ route('kegiatan') }}')">Update</button>
                            <a href="{{ route('kegiatan') }}" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
