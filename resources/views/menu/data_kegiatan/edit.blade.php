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
        <h1 class="h3 mb-0 text-gray-800"><i class="bi bi-ui-checks-grid"></i> Edit Kegiatan</h1>
        <a href="{{ route('kegiatan') }}" class="btn btn-secondary btn-icon-split">
            <span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
            <span class="text">Kembali</span>
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-edit"></i> Edit Data Kegiatan</h6>
        </div>

        <form method="POST" action="{{ route('kegiatan.update', $kegiatan->id) }}" enctype="multipart/form-data"
            id="update-form">
            @csrf
            @method('PUT')

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control"
                                placeholder="Masukkan nama kegiatan..." value="{{ $kegiatan->nama }}" required>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Jenis</label>
                            <select name="jenis" id="jenis" class="form-control" required>
                                <option value="">-- Pilih Jenis --</option>
                                <option value="Lapangan" {{ $kegiatan->jenis == 'Lapangan' ? 'selected' : '' }}>Lapangan
                                </option>
                                <option value="Pengolahan" {{ $kegiatan->jenis == 'Pengolahan' ? 'selected' : '' }}>
                                    Pengolahan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Level</label>
                            <select name="level" id="level" class="form-control" required>
                                <option value="">-- Pilih Level --</option>
                                <option value="Umum" {{ $kegiatan->level == 'Umum' ? 'selected' : '' }}>Umum</option>
                                <option value="Provinsi" {{ $kegiatan->level == 'Provinsi' ? 'selected' : '' }}>
                                    Provinsi</option>
                                <option value="Kabupaten/Kota" {{ $kegiatan->level == 'Kabupaten/Kota' ? 'selected' : ''
                                    }}>
                                    Kabupaten/Kota</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Tanggal Mulai</label>
                            <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control"
                                value="{{ $kegiatan->tanggal_mulai }}" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Gambar</label>
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
                            <label class="font-weight-bold">Tanggal Selesai</label>
                            <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control"
                                value="{{ $kegiatan->tanggal_selesai }}" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Deskripsi Kegiatan</label>
                    <textarea name="detail_kegiatan" id="detail_kegiatan" class="form-control"
                        placeholder="Silahkan isi deskripsi kegiatan..." rows="6"
                        required>{{ $kegiatan->detail_kegiatan }}</textarea>
                </div>
            </div>

            <div class="card-footer text-right">
                <button type="button" class="btn btn-primary"
                    onclick="swalConfirmUpdate('Apakah Anda yakin ingin mengupdate data kegiatan ini?', 'Data kegiatan berhasil diupdate', '{{ route('kegiatan') }}')">
                    <i class="fa fa-save"></i> Update</button>
                <button type="reset" class="btn btn-info">
                    <i class="fa fa-sync-alt"></i> Reset</button>
            </div>
        </form>
    </div>
</x-app-layout>